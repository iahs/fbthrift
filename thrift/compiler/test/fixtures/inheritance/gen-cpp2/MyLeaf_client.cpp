/**
 * Autogenerated by Thrift
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
#include "thrift/compiler/test/fixtures/inheritance/gen-cpp2/MyLeaf.h"

#include "thrift/compiler/test/fixtures/inheritance/gen-cpp2/MyLeaf.tcc"

#include <thrift/lib/cpp2/protocol/BinaryProtocol.h>
#include <thrift/lib/cpp2/protocol/CompactProtocol.h>
namespace cpp2 {

const char* MyLeafAsyncClient::getServiceName() {
  return "MyLeaf";
}

void MyLeafAsyncClient::do_leaf(std::unique_ptr<apache::thrift::RequestCallback> callback) {
  ::apache::thrift::RpcOptions rpcOptions;
  do_leafImpl(false, rpcOptions, std::move(callback));
}

void MyLeafAsyncClient::do_leaf(apache::thrift::RpcOptions& rpcOptions, std::unique_ptr<apache::thrift::RequestCallback> callback) {
  do_leafImpl(false, rpcOptions, std::move(callback));
}

void MyLeafAsyncClient::do_leafImpl(bool useSync, apache::thrift::RpcOptions& rpcOptions, std::unique_ptr<apache::thrift::RequestCallback> callback) {
  switch(getChannel()->getProtocolId()) {
    case apache::thrift::protocol::T_BINARY_PROTOCOL:
    {
      apache::thrift::BinaryProtocolWriter writer;
      do_leafT(&writer, useSync, rpcOptions, std::move(callback));
      break;
    }
    case apache::thrift::protocol::T_COMPACT_PROTOCOL:
    {
      apache::thrift::CompactProtocolWriter writer;
      do_leafT(&writer, useSync, rpcOptions, std::move(callback));
      break;
    }
    default:
    {
      throw apache::thrift::TApplicationException("Could not find Protocol");
    }
  }
}

void MyLeafAsyncClient::sync_do_leaf() {
  ::apache::thrift::RpcOptions rpcOptions;
  sync_do_leaf(rpcOptions);
}

void MyLeafAsyncClient::sync_do_leaf(apache::thrift::RpcOptions& rpcOptions) {
  apache::thrift::ClientReceiveState _returnState;
  auto callback = std::make_unique<apache::thrift::ClientSyncCallback>(&_returnState, false);
  do_leafImpl(true, rpcOptions, std::move(callback));
  SCOPE_EXIT {
    if (_returnState.header() && !_returnState.header()->getHeaders().empty()) {
      rpcOptions.setReadHeaders(_returnState.header()->releaseHeaders());
    }
  };
  if (!_returnState.buf()) {
    assert(_returnState.exceptionWrapper());
    _returnState.exceptionWrapper().throw_exception();
  }
  recv_do_leaf(_returnState);
}

folly::Future<folly::Unit> MyLeafAsyncClient::future_do_leaf() {
  ::apache::thrift::RpcOptions rpcOptions;
  return future_do_leaf(rpcOptions);
}

folly::Future<folly::Unit> MyLeafAsyncClient::future_do_leaf(apache::thrift::RpcOptions& rpcOptions) {
  folly::Promise<folly::Unit> _promise;
  auto _future = _promise.getFuture();
  auto callback = std::make_unique<apache::thrift::FutureCallback<folly::Unit>>(std::move(_promise), recv_wrapped_do_leaf, channel_);
  do_leaf(rpcOptions, std::move(callback));
  return _future;
}

folly::Future<std::pair<folly::Unit, std::unique_ptr<apache::thrift::transport::THeader>>> MyLeafAsyncClient::header_future_do_leaf(apache::thrift::RpcOptions& rpcOptions) {
  folly::Promise<std::pair<folly::Unit, std::unique_ptr<apache::thrift::transport::THeader>>> _promise;
  auto _future = _promise.getFuture();
  auto callback = std::make_unique<apache::thrift::HeaderFutureCallback<folly::Unit>>(std::move(_promise), recv_wrapped_do_leaf, channel_);
  do_leaf(rpcOptions, std::move(callback));
  return _future;
}

void MyLeafAsyncClient::do_leaf(folly::Function<void (::apache::thrift::ClientReceiveState&&)> callback) {
  do_leaf(std::make_unique<apache::thrift::FunctionReplyCallback>(std::move(callback)));
}

folly::exception_wrapper MyLeafAsyncClient::recv_wrapped_do_leaf(::apache::thrift::ClientReceiveState& state) {
  auto ew = state.exceptionWrapper();
  if (ew) {
    return ew;
  }
  if (!state.buf()) {
    return folly::make_exception_wrapper<apache::thrift::TApplicationException>("recv_ called without result");
  }
  switch(state.protocolId()) {
    case apache::thrift::protocol::T_BINARY_PROTOCOL:
    {
      apache::thrift::BinaryProtocolReader reader;
      return recv_wrapped_do_leafT(&reader, state);
    }
    case apache::thrift::protocol::T_COMPACT_PROTOCOL:
    {
      apache::thrift::CompactProtocolReader reader;
      return recv_wrapped_do_leafT(&reader, state);
    }
    default:
    {
    }
  }
  return folly::make_exception_wrapper<apache::thrift::TApplicationException>("Could not find Protocol");
}

void MyLeafAsyncClient::recv_do_leaf(::apache::thrift::ClientReceiveState& state) {
  auto ew = recv_wrapped_do_leaf(state);
  if (ew) {
    ew.throw_exception();
  }
}

void MyLeafAsyncClient::recv_instance_do_leaf(::apache::thrift::ClientReceiveState& state) {
  recv_do_leaf(state);
}

folly::exception_wrapper MyLeafAsyncClient::recv_instance_wrapped_do_leaf(::apache::thrift::ClientReceiveState& state) {
  return recv_wrapped_do_leaf(state);
}

} // cpp2
namespace apache { namespace thrift {

}} // apache::thrift
