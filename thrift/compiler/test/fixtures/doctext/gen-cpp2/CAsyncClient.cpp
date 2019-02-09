/**
 * Autogenerated by Thrift
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */

#include "src/gen-cpp2/CAsyncClient.h"

#include <folly/io/IOBuf.h>
#include <folly/io/IOBufQueue.h>
#include <thrift/lib/cpp/TApplicationException.h>
#include <thrift/lib/cpp/transport/THeader.h>
#include <thrift/lib/cpp2/protocol/BinaryProtocol.h>
#include <thrift/lib/cpp2/protocol/CompactProtocol.h>
#include <thrift/lib/cpp2/server/Cpp2ConnContext.h>
#include <thrift/lib/cpp2/GeneratedCodeHelper.h>
#include <thrift/lib/cpp2/GeneratedSerializationCodeHelper.h>

namespace cpp2 {
typedef apache::thrift::ThriftPresult<false> C_f_pargs;
typedef apache::thrift::ThriftPresult<true> C_f_presult;

template <typename Protocol_>
void CAsyncClient::fT(Protocol_* prot, bool useSync, apache::thrift::RpcOptions& rpcOptions, std::unique_ptr<apache::thrift::RequestCallback> callback) {
  struct HeaderAndReqContext {
    HeaderAndReqContext() : header(apache::thrift::transport::THeader::ALLOW_BIG_FRAMES) {}

    apache::thrift::transport::THeader header;
    apache::thrift::Cpp2ClientRequestContext reqContext;
  };
  auto headerAndReqContext = std::make_shared<HeaderAndReqContext>();
  std::shared_ptr<apache::thrift::transport::THeader> header(headerAndReqContext, &headerAndReqContext->header);
  header->setProtocolId(getChannel()->getProtocolId());
  header->setHeaders(rpcOptions.releaseWriteHeaders());
  headerAndReqContext->reqContext.setRequestHeader(header.get());
  std::unique_ptr<apache::thrift::ContextStack> ctx = this->getContextStack(this->getServiceName(), "C.f", &headerAndReqContext->reqContext);
  C_f_pargs args;
  auto sizer = [&](Protocol_* p) { return args.serializedSizeZC(p); };
  auto writer = [&](Protocol_* p) { args.write(p); };
  apache::thrift::clientSendT<Protocol_>(prot, rpcOptions, std::move(callback), std::move(ctx), header, channel_.get(), "f", writer, sizer, apache::thrift::RpcKind::SINGLE_REQUEST_SINGLE_RESPONSE, useSync);
  headerAndReqContext->reqContext.setRequestHeader(nullptr);
}



void CAsyncClient::f(std::unique_ptr<apache::thrift::RequestCallback> callback) {
  ::apache::thrift::RpcOptions rpcOptions;
  fImpl(false, rpcOptions, std::move(callback));
}

void CAsyncClient::f(apache::thrift::RpcOptions& rpcOptions, std::unique_ptr<apache::thrift::RequestCallback> callback) {
  fImpl(false, rpcOptions, std::move(callback));
}

void CAsyncClient::fImpl(bool useSync, apache::thrift::RpcOptions& rpcOptions, std::unique_ptr<apache::thrift::RequestCallback> callback) {
  switch(getChannel()->getProtocolId()) {
    case apache::thrift::protocol::T_BINARY_PROTOCOL:
    {
      apache::thrift::BinaryProtocolWriter writer;
      fT(&writer, useSync, rpcOptions, std::move(callback));
      break;
    }
    case apache::thrift::protocol::T_COMPACT_PROTOCOL:
    {
      apache::thrift::CompactProtocolWriter writer;
      fT(&writer, useSync, rpcOptions, std::move(callback));
      break;
    }
    default:
    {
      apache::thrift::detail::ac::throw_app_exn("Could not find Protocol");
    }
  }
}

void CAsyncClient::sync_f() {
  ::apache::thrift::RpcOptions rpcOptions;
  sync_f(rpcOptions);
}

void CAsyncClient::sync_f(apache::thrift::RpcOptions& rpcOptions) {
  apache::thrift::ClientReceiveState _returnState;
  auto callback = std::make_unique<apache::thrift::ClientSyncCallback>(
      &_returnState, apache::thrift::RpcKind::SINGLE_REQUEST_SINGLE_RESPONSE);
  fImpl(true, rpcOptions, std::move(callback));
  SCOPE_EXIT {
    if (_returnState.header() && !_returnState.header()->getHeaders().empty()) {
      rpcOptions.setReadHeaders(_returnState.header()->releaseHeaders());
    }
  };
  if (!_returnState.buf()) {
    assert(!!_returnState.exception());
    _returnState.exception().throw_exception();
  }
  recv_f(_returnState);
}

folly::Future<folly::Unit> CAsyncClient::future_f() {
  ::apache::thrift::RpcOptions rpcOptions;
  return future_f(rpcOptions);
}

folly::SemiFuture<folly::Unit> CAsyncClient::semifuture_f() {
  ::apache::thrift::RpcOptions rpcOptions;
  return semifuture_f(rpcOptions);
}

folly::Future<folly::Unit> CAsyncClient::future_f(apache::thrift::RpcOptions& rpcOptions) {
  folly::Promise<folly::Unit> _promise;
  auto _future = _promise.getFuture();
  auto callback = std::make_unique<apache::thrift::FutureCallback<folly::Unit>>(std::move(_promise), recv_wrapped_f, channel_);
  f(rpcOptions, std::move(callback));
  return _future;
}

folly::SemiFuture<folly::Unit> CAsyncClient::semifuture_f(apache::thrift::RpcOptions& rpcOptions) {
  auto callbackAndFuture = makeSemiFutureCallback(recv_wrapped_f, channel_);
  auto callback = std::move(callbackAndFuture.first);
  f(rpcOptions, std::move(callback));
  return std::move(callbackAndFuture.second);
}

folly::Future<std::pair<folly::Unit, std::unique_ptr<apache::thrift::transport::THeader>>> CAsyncClient::header_future_f(apache::thrift::RpcOptions& rpcOptions) {
  folly::Promise<std::pair<folly::Unit, std::unique_ptr<apache::thrift::transport::THeader>>> _promise;
  auto _future = _promise.getFuture();
  auto callback = std::make_unique<apache::thrift::HeaderFutureCallback<folly::Unit>>(std::move(_promise), recv_wrapped_f, channel_);
  f(rpcOptions, std::move(callback));
  return _future;
}

folly::SemiFuture<std::pair<folly::Unit, std::unique_ptr<apache::thrift::transport::THeader>>> CAsyncClient::header_semifuture_f(apache::thrift::RpcOptions& rpcOptions) {
  auto callbackAndFuture = makeHeaderSemiFutureCallback(recv_wrapped_f, channel_);
  auto callback = std::move(callbackAndFuture.first);
  f(rpcOptions, std::move(callback));
  return std::move(callbackAndFuture.second);
}

void CAsyncClient::f(folly::Function<void (::apache::thrift::ClientReceiveState&&)> callback) {
  f(std::make_unique<apache::thrift::FunctionReplyCallback>(std::move(callback)));
}

folly::exception_wrapper CAsyncClient::recv_wrapped_f(::apache::thrift::ClientReceiveState& state) {
  if (state.isException()) {
    return std::move(state.exception());
  }
  if (!state.buf()) {
    return folly::make_exception_wrapper<apache::thrift::TApplicationException>("recv_ called without result");
  }

  using result = C_f_presult;
  constexpr auto const fname = "f";
  switch (state.protocolId()) {
    case apache::thrift::protocol::T_BINARY_PROTOCOL:
    {
      apache::thrift::BinaryProtocolReader reader;
      return apache::thrift::detail::ac::recv_wrapped<result>(
          fname, &reader, state);
    }
    case apache::thrift::protocol::T_COMPACT_PROTOCOL:
    {
      apache::thrift::CompactProtocolReader reader;
      return apache::thrift::detail::ac::recv_wrapped<result>(
          fname, &reader, state);
    }
    default:
    {
    }
  }
  return folly::make_exception_wrapper<apache::thrift::TApplicationException>("Could not find Protocol");
}

void CAsyncClient::recv_f(::apache::thrift::ClientReceiveState& state) {
  auto ew = recv_wrapped_f(state);
  if (ew) {
    ew.throw_exception();
  }
}

void CAsyncClient::recv_instance_f(::apache::thrift::ClientReceiveState& state) {
  recv_f(state);
}

folly::exception_wrapper CAsyncClient::recv_instance_wrapped_f(::apache::thrift::ClientReceiveState& state) {
  return recv_wrapped_f(state);
}

} // cpp2
namespace apache { namespace thrift {

}} // apache::thrift
