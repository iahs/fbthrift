/*
 * Copyright (c) Facebook, Inc. and its affiliates.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

#include <memory>
#include <stdexcept>

#include <folly/executors/GlobalExecutor.h>
#include <folly/portability/GMock.h>
#include <folly/portability/GTest.h>

#include <thrift/lib/cpp2/GeneratedCodeHelper.h>
#include <thrift/lib/cpp2/PluggableFunction.h>
#include <thrift/lib/cpp2/async/HeaderClientChannel.h>
#include <thrift/lib/cpp2/async/RocketClientChannel.h>
#include <thrift/lib/cpp2/server/BaseThriftServer.h>
#include <thrift/lib/cpp2/server/MonitoringServerInterface.h>
#include <thrift/lib/cpp2/server/ThriftServer.h>
#include <thrift/lib/cpp2/transport/rocket/server/SetupFrameHandler.h>
#include <thrift/lib/cpp2/util/ScopedServerInterfaceThread.h>
#include <thrift/lib/thrift/gen-cpp2/RpcMetadata_types.h>

#include <thrift/lib/cpp2/test/gen-cpp2/Child.h>
#include <thrift/lib/cpp2/test/gen-cpp2/Parent.h>

namespace apache::thrift::test {

using MethodMetadata = AsyncProcessorFactory::MethodMetadata;
using MethodMetadataMap = AsyncProcessorFactory::MethodMetadataMap;
using WildcardMethodMetadata = AsyncProcessorFactory::WildcardMethodMetadata;
using WildcardMethodMetadataMap =
    AsyncProcessorFactory::WildcardMethodMetadataMap;
using CreateMethodMetadataResult =
    AsyncProcessorFactory::CreateMethodMetadataResult;

namespace {
class Child : public ChildSvIf {
  MOCK_METHOD(std::unique_ptr<InteractionIf>, createInteraction, ());

  int parentMethod1() override { return 42; }
  int parentMethod3() override { return 24; }
  void childMethod2(std::string& result) override { result = "hello"; }
};

MethodMetadataMap& expectMethodMetadataMap(
    CreateMethodMetadataResult& createMethodMetadataResult) {
  if (auto map = std::get_if<MethodMetadataMap>(&createMethodMetadataResult)) {
    return *map;
  }
  throw std::logic_error{"Expected createMethodMetadata to return a map"};
}

} // namespace

TEST(AsyncProcessorMetadataTest, ParentMetadata) {
  ParentSvIf service;
  auto createMethodMetadataResult = service.createMethodMetadata();
  auto& metadataMap = expectMethodMetadataMap(createMethodMetadataResult);

  EXPECT_EQ(metadataMap.size(), 3);
  EXPECT_NE(metadataMap.find("parentMethod1"), metadataMap.end());
  EXPECT_NE(metadataMap.find("parentMethod2"), metadataMap.end());
  EXPECT_NE(metadataMap.find("parentMethod3"), metadataMap.end());
}

TEST(AsyncProcessorMetadataTest, ChildMetadata) {
  Child service;
  auto createMethodMetadataResult = service.createMethodMetadata();
  auto& metadataMap = expectMethodMetadataMap(createMethodMetadataResult);

  EXPECT_EQ(metadataMap.size(), 6);
  EXPECT_NE(metadataMap.find("parentMethod1"), metadataMap.end());
  EXPECT_NE(metadataMap.find("parentMethod2"), metadataMap.end());
  EXPECT_NE(metadataMap.find("parentMethod3"), metadataMap.end());
  EXPECT_NE(metadataMap.find("childMethod1"), metadataMap.end());
  EXPECT_NE(metadataMap.find("childMethod2"), metadataMap.end());
  EXPECT_NE(
      metadataMap.find("Interaction.interactionMethod"), metadataMap.end());
}

namespace {
class ChildWithMetadata : public Child {
 public:
  using MetadataFactory = std::function<CreateMethodMetadataResult(
      CreateMethodMetadataResult defaultResult)>;

  explicit ChildWithMetadata(MetadataFactory metadataFactory)
      : metadataFactory_(std::move(metadataFactory)) {}

 private:
  CreateMethodMetadataResult createMethodMetadata() override {
    return metadataFactory_(Child::createMethodMetadata());
  }

  MetadataFactory metadataFactory_;
};

class AsyncProcessorMethodResolutionTestP
    : public ::testing::TestWithParam<bool> {
 public:
  bool useRocket() const { return GetParam(); }

  template <typename ClientT>
  std::unique_ptr<ClientT> makeClientFor(ScopedServerInterfaceThread& runner) {
    return runner.newClient<ClientT>(nullptr, [&](auto socket) {
      return useRocket() ? RocketClientChannel::newChannel(std::move(socket))
                         : HeaderClientChannel::newChannel(std::move(socket));
    });
  }
};
} // namespace

TEST_P(AsyncProcessorMethodResolutionTestP, CreateMethodMetadataNotSupported) {
  auto service = std::make_shared<ChildWithMetadata>(
      [](auto&&) -> CreateMethodMetadataResult { return {}; });
  ScopedServerInterfaceThread runner{service};
  auto client = makeClientFor<ChildAsyncClient>(runner);

  // Recursive method resolution in action
  EXPECT_EQ(client->semifuture_parentMethod1().get(), 42);
  EXPECT_EQ(client->semifuture_childMethod2().get(), "hello");
}

TEST_P(AsyncProcessorMethodResolutionTestP, EmptyMap) {
  auto service = std::make_shared<ChildWithMetadata>(
      [](auto&&) -> MethodMetadataMap { return {}; });
  ScopedServerInterfaceThread runner{service};
  auto client = makeClientFor<ChildAsyncClient>(runner);

  EXPECT_THROW(client->semifuture_parentMethod1().get(), TApplicationException);
  EXPECT_THROW(client->semifuture_childMethod2().get(), TApplicationException);
}

TEST_P(AsyncProcessorMethodResolutionTestP, MistypedMetadataDeathTest) {
  auto runTest = [&](auto&& callback) {
    auto service = std::make_shared<ChildWithMetadata>([](auto defaultResult) {
      MethodMetadataMap result;
      const auto& defaultMap = expectMethodMetadataMap(defaultResult);
      for (auto& [name, _] : defaultMap) {
        class DummyMethodMetadata : public MethodMetadata {};
        result.emplace(name, std::make_unique<DummyMethodMetadata>());
      }
      return result;
    });
    ScopedServerInterfaceThread runner{service};
    callback(makeClientFor<ChildAsyncClient>(runner));
  };

  EXPECT_DEATH(
      runTest([](auto client) { client->semifuture_parentMethod1().get(); }),
      "Received MethodMetadata of an unknown type");
  EXPECT_DEATH(
      runTest([](auto client) { client->semifuture_childMethod2().get(); }),
      "Received MethodMetadata of an unknown type");
}

TEST_P(AsyncProcessorMethodResolutionTestP, ParentMapDeathTest) {
  // We strictly require the correct metadata type, even if the parent's map
  // might contain all the function pointers we need.
  EXPECT_DEATH(
      [&] {
        auto service = std::make_shared<ChildWithMetadata>(
            [](auto&&) { return ParentSvIf{}.createMethodMetadata(); });
        ScopedServerInterfaceThread runner{service};
        auto client = makeClientFor<ChildAsyncClient>(runner);
        client->semifuture_parentMethod1().get();
      }(),
      "Received MethodMetadata of an unknown type");
}

TEST_P(AsyncProcessorMethodResolutionTestP, Wildcard) {
  auto runTest = [&](auto&& callback) {
    class ChildImpl : public Child {
      CreateMethodMetadataResult createMethodMetadata() override {
        auto defaultResult = Child::createMethodMetadata();
        auto& defaultMap = expectMethodMetadataMap(defaultResult);
        MethodMetadataMap knownMethods;
        // swap out for another method to make sure we are using this map
        knownMethods.emplace(
            "parentMethod1", std::move(defaultMap["parentMethod3"]));
        return WildcardMethodMetadataMap{std::move(knownMethods)};
      }

      std::unique_ptr<AsyncProcessor> getProcessor() override {
        class ProcessorImpl : public ChildAsyncProcessor {
          using ChildAsyncProcessor::ChildAsyncProcessor;

          void processSerializedCompressedRequestWithMetadata(
              ResponseChannelRequest::UniquePtr req,
              SerializedCompressedRequest&& serializedRequest,
              const MethodMetadata& methodMetadata,
              protocol::PROTOCOL_TYPES protType,
              Cpp2RequestContext* context,
              folly::EventBase* eb,
              concurrency::ThreadManager* tm) override {
            if (dynamic_cast<const WildcardMethodMetadata*>(&methodMetadata)) {
              // Instead of crashing when receiving a wildcard method metadata,
              // return an error so we can check that the correct metadata was
              // propagated.
              req->sendErrorWrapped(
                  folly::make_exception_wrapper<TApplicationException>(
                      TApplicationException::UNKNOWN_METHOD, ""),
                  "");
              return;
            }
            ChildAsyncProcessor::processSerializedCompressedRequestWithMetadata(
                std::move(req),
                std::move(serializedRequest),
                methodMetadata,
                protType,
                context,
                eb,
                tm);
          }
        };
        return std::make_unique<ProcessorImpl>(this);
      }
    };
    ScopedServerInterfaceThread runner{std::make_shared<ChildImpl>()};
    return callback(makeClientFor<ChildAsyncClient>(runner));
  };

  EXPECT_EQ(
      runTest(
          [](auto client) { return client->semifuture_parentMethod1().get(); }),
      24);
  // This method is not in the map so the processor should receive
  // WildcardMethodMetadata
  EXPECT_THROW(
      runTest([](auto client) { client->semifuture_childMethod2().get(); }),
      TApplicationException);
}

TEST_P(AsyncProcessorMethodResolutionTestP, Interaction) {
  if (!useRocket()) {
    // Interactions are not supported on header
    return;
  }
  class ChildWithInteraction : public ChildSvIf {
    std::unique_ptr<InteractionIf> createInteraction() override {
      class InteractionImpl : public InteractionIf {
        int interactionMethod() override { return ++counter_; }
        std::atomic<int> counter_{0};
      };
      return std::make_unique<InteractionImpl>();
    }
  };
  auto service = std::make_shared<ChildWithInteraction>();
  ScopedServerInterfaceThread runner{service};
  auto client = makeClientFor<ChildAsyncClient>(runner);

  auto interaction2 = client->createInteraction();
  EXPECT_EQ(interaction2.semifuture_interactionMethod().get(), 1);
  EXPECT_EQ(interaction2.semifuture_interactionMethod().get(), 2);
}

INSTANTIATE_TEST_SUITE_P(
    AsyncProcessorMethodResolutionTestP,
    AsyncProcessorMethodResolutionTestP,
    ::testing::Values(false, true));

namespace {
// Setup monitoring interface handler for test below
THRIFT_PLUGGABLE_FUNC_SET(
    std::unique_ptr<rocket::SetupFrameHandler>,
    createRocketMonitoringSetupFrameHandler,
    ThriftServer& server) {
  class MonitoringConnectionHandler : public rocket::SetupFrameHandler {
   public:
    explicit MonitoringConnectionHandler(ThriftServer& server)
        : server_(server) {}

    std::optional<rocket::ProcessorInfo> tryHandle(
        const RequestSetupMetadata& meta) override {
      if (meta.interfaceKind_ref() == InterfaceKind::MONITORING) {
        auto processorFactory = server_.getMonitoringProcessorFactory();
        DCHECK(processorFactory);
        return rocket::ProcessorInfo{
            *processorFactory,
            std::make_shared<concurrency::ThreadManagerExecutorAdapter>(
                folly::getGlobalCPUExecutor()),
            server_,
            nullptr /* requestsRegistry */
        };
      }
      return std::nullopt;
    }

   private:
    ThriftServer& server_;
  };
  return std::make_unique<MonitoringConnectionHandler>(server);
}
} // namespace

TEST(AsyncProcessorMethodResolutionTest, MultipleService) {
  class Monitor : public ChildSvIf, public MonitoringServerInterface {
    MOCK_METHOD(std::unique_ptr<InteractionIf>, createInteraction, ());

    int parentMethod1() override { return 84; }
    void childMethod2(std::string& result) override {
      result = "hello from Monitor";
    }
  };
  ScopedServerInterfaceThread runner{std::make_shared<Child>()};
  runner.getThriftServer().setMonitoringInterface(std::make_shared<Monitor>());

  auto client = runner.newClient<ChildAsyncClient>(
      nullptr, RocketClientChannel::newChannel);
  auto monitoringClient =
      runner.newClient<ChildAsyncClient>(nullptr, [](auto socket) {
        RequestSetupMetadata setupMetadata;
        setupMetadata.interfaceKind_ref() = InterfaceKind::MONITORING;
        return RocketClientChannel::newChannelWithMetadata(
            std::move(socket), std::move(setupMetadata));
      });

  EXPECT_EQ(client->semifuture_parentMethod1().get(), 42);
  EXPECT_EQ(client->semifuture_childMethod2().get(), "hello");
  EXPECT_EQ(monitoringClient->semifuture_parentMethod1().get(), 84);
  EXPECT_EQ(
      monitoringClient->semifuture_childMethod2().get(), "hello from Monitor");
}

} // namespace apache::thrift::test
