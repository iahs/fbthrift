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

#include <folly/portability/GTest.h>
#include <thrift/lib/cpp2/protocol/Serializer.h>
#include <thrift/lib/cpp2/protocol/detail/index.h>
#include <thrift/lib/cpp2/reflection/testing.h>
#include <thrift/test/lazy_deserialization/MemberAccessor.h>
#include <thrift/test/lazy_deserialization/gen-cpp2/simple_constants.h>
#include <thrift/test/lazy_deserialization/gen-cpp2/simple_fatal_all.h>

namespace apache::thrift::test {

// Represent the field header and actual field data in serialized data
struct FieldToken {
  std::string header, value;
  size_t size() const { return header.size() + value.size(); }
};

// Merge field tokens back to serialized data
std::string merge(const std::vector<FieldToken>& tokens) {
  std::string serializedData;
  for (auto&& i : tokens) {
    serializedData += i.header;
    serializedData += i.value;
  }
  serializedData += '\x0'; // STOP FIELD
  return serializedData;
}

// Split serialized data into field token
template <class Reader, class Writer>
std::vector<FieldToken> tokenize(
    std::string serializedData, Serializer<Reader, Writer>) {
  std::string name;
  int16_t id;
  TType ftype;
  auto buf = IOBuf::copyBuffer(serializedData);

  Reader reader;
  reader.readStructBegin(name);
  reader.setInput(buf.get());

  std::vector<FieldToken> tokens;
  while (true) {
    auto fieldBegin = reader.getCursor();
    reader.readFieldBegin(name, ftype, id);

    if (ftype == TType::T_STOP) {
      EXPECT_EQ(merge(tokens), serializedData); // Sanity check
      return tokens;
    }

    auto fieldHeaderEnd = reader.getCursor();
    reader.skip(ftype);
    auto fieldEnd = reader.getCursor();

    FieldToken field;
    field.header = fieldBegin.readFixedString(fieldHeaderEnd - fieldBegin);
    field.value = fieldHeaderEnd.readFixedString(fieldEnd - fieldHeaderEnd);
    tokens.push_back(field);
  }
}

template <class Struct, class Reader, class Writer>
std::vector<FieldToken> tokenize(
    const Struct& obj, Serializer<Reader, Writer> ser) {
  return tokenize(ser.template serialize<std::string>(obj), ser);
}

template <class Reader, class Writer>
std::string genFieldHeader(TType type, int16_t id, Serializer<Reader, Writer>) {
  IOBufQueue output;
  Writer writer;
  writer.setOutput(&output);
  writer.writeFieldBegin("", type, id);
  return output.moveAsValue().moveToFbString().toStdString();
}

template <class Struct>
Struct gen() {
  Struct obj;
  obj.field1_ref().emplace(100, 1);
  obj.field2_ref().emplace(200, 2);
  obj.field3_ref().emplace(300, 3);
  obj.field4_ref().emplace(400, 4);
  return obj;
}

template <class Serializer>
IndexedFoo genIndexedFoo(Serializer ser) {
  auto obj = gen<IndexedFoo>();
  auto tokens = tokenize(obj, ser);
  obj.serialized_data_size_ref() =
      tokens[1].size() + tokens[2].size() + tokens[3].size() + tokens[4].size();
  if (std::is_same_v<Serializer, CompactSerializer>) {
    // field2 and field4 are hard to skip for CompactProtocol, but not
    // BinaryProtocol
    obj.field_id_to_size_ref() = {
        {2, tokens[2].value.size()},
        {4, tokens[4].value.size()},
    };
  }

  return obj;
}

FBTHRIFT_DEFINE_MEMBER_ACCESSOR(get_field1, LazyFoo, field1);
FBTHRIFT_DEFINE_MEMBER_ACCESSOR(get_field2, LazyFoo, field2);
FBTHRIFT_DEFINE_MEMBER_ACCESSOR(get_field3, LazyFoo, field3);
FBTHRIFT_DEFINE_MEMBER_ACCESSOR(get_field4, LazyFoo, field4);

template <typename T>
class Index : public testing::Test {};

using Serializers = ::testing::Types<CompactSerializer, BinarySerializer>;
TYPED_TEST_SUITE(Index, Serializers);

TYPED_TEST(Index, IndexedFooToLazyFoo) {
  auto indexedFoo = genIndexedFoo(TypeParam{});
  auto tokens = tokenize(indexedFoo, TypeParam{});

  // Replace header with internal field ids
  tokens.begin()->header = genFieldHeader(
      detail::kSizeField.type, detail::kSizeField.id, TypeParam{});
  tokens.rbegin()->header = genFieldHeader(
      detail::kIndexField.type, detail::kIndexField.id, TypeParam{});

  auto lazyFoo = TypeParam::template deserialize<LazyFoo>(merge(tokens));

  // field3 and field4 are lazy fields, their deserialization are deferred
  EXPECT_EQ(get_field1(lazyFoo), indexedFoo.field1_ref());
  EXPECT_EQ(get_field2(lazyFoo), indexedFoo.field2_ref());
  EXPECT_TRUE(get_field3(lazyFoo).empty());
  EXPECT_TRUE(get_field4(lazyFoo).empty());

  EXPECT_EQ(lazyFoo.field1_ref(), indexedFoo.field1_ref());
  EXPECT_EQ(lazyFoo.field2_ref(), indexedFoo.field2_ref());
  EXPECT_EQ(lazyFoo.field3_ref(), indexedFoo.field3_ref());
  EXPECT_EQ(lazyFoo.field4_ref(), indexedFoo.field4_ref());

  EXPECT_EQ(get_field1(lazyFoo), indexedFoo.field1_ref());
  EXPECT_EQ(get_field2(lazyFoo), indexedFoo.field2_ref());
  EXPECT_EQ(get_field3(lazyFoo), indexedFoo.field3_ref());
  EXPECT_EQ(get_field4(lazyFoo), indexedFoo.field4_ref());
}

TYPED_TEST(Index, LazyFooToIndexedFoo) {
  auto lazyFoo = gen<LazyFoo>();
  auto tokens = tokenize(lazyFoo, TypeParam{});

  tokens.begin()->header = genFieldHeader(
      detail::kSizeField.type, simple_constants::kSizeId(), TypeParam{});
  tokens.rbegin()->header = genFieldHeader(
      detail::kIndexField.type, simple_constants::kIndexId(), TypeParam{});

  auto indexedFoo = TypeParam::template deserialize<IndexedFoo>(merge(tokens));

  EXPECT_EQ(lazyFoo.field1_ref(), indexedFoo.field1_ref());
  EXPECT_EQ(lazyFoo.field2_ref(), indexedFoo.field2_ref());
  EXPECT_EQ(lazyFoo.field3_ref(), indexedFoo.field3_ref());
  EXPECT_EQ(lazyFoo.field4_ref(), indexedFoo.field4_ref());

  EXPECT_THRIFT_EQ(indexedFoo, genIndexedFoo(TypeParam{}));
}
} // namespace apache::thrift::test
