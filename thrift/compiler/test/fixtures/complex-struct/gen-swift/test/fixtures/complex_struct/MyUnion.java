/**
 * Autogenerated by Thrift
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */

package test.fixtures.complex_struct;

import com.facebook.swift.codec.*;
import com.facebook.swift.codec.ThriftField.Requiredness;
import com.facebook.swift.codec.ThriftField.Recursiveness;
import java.util.*;
import org.apache.thrift.*;
import org.apache.thrift.async.*;
import org.apache.thrift.server.*;
import org.apache.thrift.transport.*;
import org.apache.thrift.protocol.*;

import static com.google.common.base.MoreObjects.toStringHelper;

@SwiftGenerated
@ThriftUnion("MyUnion")
public final class MyUnion {
    private static final TStruct STRUCT_DESC = new TStruct("MyUnion");
    private static final Map<String, Integer> NAMES_TO_IDS = new HashMap();
    private static final Map<Integer, Object> FIELD_METADATA = new HashMap<>();

    public static final int _MYENUM = 1;
    private static final TField MY_ENUM_FIELD_DESC = new TField("myEnum", TType.I32, (short)1);
    public static final int _MYSTRUCT = 2;
    private static final TField MY_STRUCT_FIELD_DESC = new TField("myStruct", TType.STRUCT, (short)2);
    public static final int _MYDATAITEM = 3;
    private static final TField MY_DATA_ITEM_FIELD_DESC = new TField("myDataItem", TType.STRUCT, (short)3);
    public static final int _COMPLEXNESTEDSTRUCT = 4;
    private static final TField COMPLEX_NESTED_STRUCT_FIELD_DESC = new TField("complexNestedStruct", TType.STRUCT, (short)4);
    public static final int _LONGVALUE = 5;
    private static final TField LONG_VALUE_FIELD_DESC = new TField("longValue", TType.I64, (short)5);
    public static final int _INTVALUE = 6;
    private static final TField INT_VALUE_FIELD_DESC = new TField("intValue", TType.I32, (short)6);

    static {
      NAMES_TO_IDS.put("myEnum", 1);
      FIELD_METADATA.put(1, MY_ENUM_FIELD_DESC);
      NAMES_TO_IDS.put("myStruct", 2);
      FIELD_METADATA.put(2, MY_STRUCT_FIELD_DESC);
      NAMES_TO_IDS.put("myDataItem", 3);
      FIELD_METADATA.put(3, MY_DATA_ITEM_FIELD_DESC);
      NAMES_TO_IDS.put("complexNestedStruct", 4);
      FIELD_METADATA.put(4, COMPLEX_NESTED_STRUCT_FIELD_DESC);
      NAMES_TO_IDS.put("longValue", 5);
      FIELD_METADATA.put(5, LONG_VALUE_FIELD_DESC);
      NAMES_TO_IDS.put("intValue", 6);
      FIELD_METADATA.put(6, INT_VALUE_FIELD_DESC);
    }

    private Object value;
    private short id;

    @ThriftConstructor
    public MyUnion() {
    }
    
    @ThriftConstructor
    @Deprecated
    public MyUnion(final test.fixtures.complex_struct.MyEnum myEnum) {
        this.value = myEnum;
        this.id = 1;
    }
    
    @ThriftConstructor
    @Deprecated
    public MyUnion(final test.fixtures.complex_struct.MyStruct myStruct) {
        this.value = myStruct;
        this.id = 2;
    }
    
    @ThriftConstructor
    @Deprecated
    public MyUnion(final test.fixtures.complex_struct.MyDataItem myDataItem) {
        this.value = myDataItem;
        this.id = 3;
    }
    
    @ThriftConstructor
    @Deprecated
    public MyUnion(final test.fixtures.complex_struct.ComplexNestedStruct complexNestedStruct) {
        this.value = complexNestedStruct;
        this.id = 4;
    }
    
    @ThriftConstructor
    @Deprecated
    public MyUnion(final long longValue) {
        this.value = longValue;
        this.id = 5;
    }
    
    @ThriftConstructor
    @Deprecated
    public MyUnion(final int intValue) {
        this.value = intValue;
        this.id = 6;
    }
    
    public static MyUnion fromMyEnum(final test.fixtures.complex_struct.MyEnum myEnum) {
        MyUnion res = new MyUnion();
        res.value = myEnum;
        res.id = 1;
        return res;
    }
    
    public static MyUnion fromMyStruct(final test.fixtures.complex_struct.MyStruct myStruct) {
        MyUnion res = new MyUnion();
        res.value = myStruct;
        res.id = 2;
        return res;
    }
    
    public static MyUnion fromMyDataItem(final test.fixtures.complex_struct.MyDataItem myDataItem) {
        MyUnion res = new MyUnion();
        res.value = myDataItem;
        res.id = 3;
        return res;
    }
    
    public static MyUnion fromComplexNestedStruct(final test.fixtures.complex_struct.ComplexNestedStruct complexNestedStruct) {
        MyUnion res = new MyUnion();
        res.value = complexNestedStruct;
        res.id = 4;
        return res;
    }
    
    public static MyUnion fromLongValue(final long longValue) {
        MyUnion res = new MyUnion();
        res.value = longValue;
        res.id = 5;
        return res;
    }
    
    public static MyUnion fromIntValue(final int intValue) {
        MyUnion res = new MyUnion();
        res.value = intValue;
        res.id = 6;
        return res;
    }
    

    @ThriftField(value=1, name="myEnum", requiredness=Requiredness.NONE)
    public test.fixtures.complex_struct.MyEnum getMyEnum() {
        if (this.id != 1) {
            throw new IllegalStateException("Not a myEnum element!");
        }
        return (test.fixtures.complex_struct.MyEnum) value;
    }

    public boolean isSetMyEnum() {
        return this.id == 1;
    }

    @ThriftField(value=2, name="myStruct", requiredness=Requiredness.NONE)
    public test.fixtures.complex_struct.MyStruct getMyStruct() {
        if (this.id != 2) {
            throw new IllegalStateException("Not a myStruct element!");
        }
        return (test.fixtures.complex_struct.MyStruct) value;
    }

    public boolean isSetMyStruct() {
        return this.id == 2;
    }

    @ThriftField(value=3, name="myDataItem", requiredness=Requiredness.NONE)
    public test.fixtures.complex_struct.MyDataItem getMyDataItem() {
        if (this.id != 3) {
            throw new IllegalStateException("Not a myDataItem element!");
        }
        return (test.fixtures.complex_struct.MyDataItem) value;
    }

    public boolean isSetMyDataItem() {
        return this.id == 3;
    }

    @ThriftField(value=4, name="complexNestedStruct", requiredness=Requiredness.NONE)
    public test.fixtures.complex_struct.ComplexNestedStruct getComplexNestedStruct() {
        if (this.id != 4) {
            throw new IllegalStateException("Not a complexNestedStruct element!");
        }
        return (test.fixtures.complex_struct.ComplexNestedStruct) value;
    }

    public boolean isSetComplexNestedStruct() {
        return this.id == 4;
    }

    @ThriftField(value=5, name="longValue", requiredness=Requiredness.NONE)
    public long getLongValue() {
        if (this.id != 5) {
            throw new IllegalStateException("Not a longValue element!");
        }
        return (long) value;
    }

    public boolean isSetLongValue() {
        return this.id == 5;
    }

    @ThriftField(value=6, name="intValue", requiredness=Requiredness.NONE)
    public int getIntValue() {
        if (this.id != 6) {
            throw new IllegalStateException("Not a intValue element!");
        }
        return (int) value;
    }

    public boolean isSetIntValue() {
        return this.id == 6;
    }

    @ThriftUnionId
    public short getThriftId() {
        return this.id;
    }

    public String getThriftName() {
        TField tField = (TField) FIELD_METADATA.get((int) this.id);
        if (tField == null) {
            return "null";
        } else {
            return tField.name;
        }
    }

    public void accept(Visitor visitor) {
        if (isSetMyEnum()) {
            visitor.visitMyEnum(getMyEnum());
            return;
        }
        if (isSetMyStruct()) {
            visitor.visitMyStruct(getMyStruct());
            return;
        }
        if (isSetMyDataItem()) {
            visitor.visitMyDataItem(getMyDataItem());
            return;
        }
        if (isSetComplexNestedStruct()) {
            visitor.visitComplexNestedStruct(getComplexNestedStruct());
            return;
        }
        if (isSetLongValue()) {
            visitor.visitLongValue(getLongValue());
            return;
        }
        if (isSetIntValue()) {
            visitor.visitIntValue(getIntValue());
            return;
        }
    }

    @Override
    public String toString() {
        return toStringHelper(this)
            .add("value", value)
            .add("id", id)
            .add("name", getThriftName())
            .add("type", value == null ? "<null>" : value.getClass().getSimpleName())
            .toString();
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) {
            return true;
        }
        if (o == null || getClass() != o.getClass()) {
            return false;
        }

        MyUnion other = (MyUnion)o;

        return Objects.equals(this.id, other.id)
                && Objects.deepEquals(this.value, other.value);
    }

    @Override
    public int hashCode() {
        return Arrays.deepHashCode(new Object[] {
            id,
            value,
        });
    }

    public interface Visitor {
        void visitMyEnum(test.fixtures.complex_struct.MyEnum myEnum);
        void visitMyStruct(test.fixtures.complex_struct.MyStruct myStruct);
        void visitMyDataItem(test.fixtures.complex_struct.MyDataItem myDataItem);
        void visitComplexNestedStruct(test.fixtures.complex_struct.ComplexNestedStruct complexNestedStruct);
        void visitLongValue(long longValue);
        void visitIntValue(int intValue);
    }

    public void write0(TProtocol oprot) throws TException {
      oprot.writeStructBegin(STRUCT_DESC);
      if (this.id != 0 && this.value == null ){
         throw new TProtocolException("Cannot write a Union with marked-as-set but null value!");
      }
      switch (this.id) {
      case _MYENUM: {
        oprot.writeFieldBegin(MY_ENUM_FIELD_DESC);
        test.fixtures.complex_struct.MyEnum myEnum = (test.fixtures.complex_struct.MyEnum)this.value;
        oprot.writeI32(myEnum == null ? 0 : myEnum.getValue());
        oprot.writeFieldEnd();
        break;
      }
      case _MYSTRUCT: {
        oprot.writeFieldBegin(MY_STRUCT_FIELD_DESC);
        test.fixtures.complex_struct.MyStruct myStruct = (test.fixtures.complex_struct.MyStruct)this.value;
        myStruct.write0(oprot);
        oprot.writeFieldEnd();
        break;
      }
      case _MYDATAITEM: {
        oprot.writeFieldBegin(MY_DATA_ITEM_FIELD_DESC);
        test.fixtures.complex_struct.MyDataItem myDataItem = (test.fixtures.complex_struct.MyDataItem)this.value;
        myDataItem.write0(oprot);
        oprot.writeFieldEnd();
        break;
      }
      case _COMPLEXNESTEDSTRUCT: {
        oprot.writeFieldBegin(COMPLEX_NESTED_STRUCT_FIELD_DESC);
        test.fixtures.complex_struct.ComplexNestedStruct complexNestedStruct = (test.fixtures.complex_struct.ComplexNestedStruct)this.value;
        complexNestedStruct.write0(oprot);
        oprot.writeFieldEnd();
        break;
      }
      case _LONGVALUE: {
        oprot.writeFieldBegin(LONG_VALUE_FIELD_DESC);
        long longValue = (long)this.value;
        oprot.writeI64(longValue);
        oprot.writeFieldEnd();
        break;
      }
      case _INTVALUE: {
        oprot.writeFieldBegin(INT_VALUE_FIELD_DESC);
        int intValue = (int)this.value;
        oprot.writeI32(intValue);
        oprot.writeFieldEnd();
        break;
      }
      default:
          throw new IllegalStateException("Cannot write union with unknown field ");
      }
      oprot.writeFieldStop();
      oprot.writeStructEnd();
    }
    
    public static MyUnion read0(TProtocol oprot) throws TException {
      MyUnion res = new MyUnion();
      res.value = null;
      res.id = (short) 0;
      oprot.readStructBegin(MyUnion.NAMES_TO_IDS, MyUnion.FIELD_METADATA);
      TField __field = oprot.readFieldBegin();
      if (__field.type != TType.STOP) {
          switch (__field.id) {
          case _MYENUM:
            if (__field.type == MY_ENUM_FIELD_DESC.type) {
              test.fixtures.complex_struct.MyEnum myEnum = test.fixtures.complex_struct.MyEnum.fromInteger(oprot.readI32());
              res.value = myEnum;
            }
            break;
          case _MYSTRUCT:
            if (__field.type == MY_STRUCT_FIELD_DESC.type) {
              test.fixtures.complex_struct.MyStruct myStruct = test.fixtures.complex_struct.MyStruct.read0(oprot);
              res.value = myStruct;
            }
            break;
          case _MYDATAITEM:
            if (__field.type == MY_DATA_ITEM_FIELD_DESC.type) {
              test.fixtures.complex_struct.MyDataItem myDataItem = test.fixtures.complex_struct.MyDataItem.read0(oprot);
              res.value = myDataItem;
            }
            break;
          case _COMPLEXNESTEDSTRUCT:
            if (__field.type == COMPLEX_NESTED_STRUCT_FIELD_DESC.type) {
              test.fixtures.complex_struct.ComplexNestedStruct complexNestedStruct = test.fixtures.complex_struct.ComplexNestedStruct.read0(oprot);
              res.value = complexNestedStruct;
            }
            break;
          case _LONGVALUE:
            if (__field.type == LONG_VALUE_FIELD_DESC.type) {
              long longValue = oprot.readI64();
              res.value = longValue;
            }
            break;
          case _INTVALUE:
            if (__field.type == INT_VALUE_FIELD_DESC.type) {
              int intValue = oprot.readI32();
              res.value = intValue;
            }
            break;
          default:
            TProtocolUtil.skip(oprot, __field.type);
          }
        if (res.value != null) {
          res.id = __field.id;
        }
        oprot.readFieldEnd();
      }
      oprot.readStructEnd();
      return res;
    }
}
