/**
 * Autogenerated by Thrift
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */

package test.fixtures.empty_struct;

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
@ThriftUnion("Nada")
public final class Nada {
    private static final TStruct STRUCT_DESC = new TStruct("Nada");
    private static final Map<String, Integer> NAMES_TO_IDS = new HashMap();
    private static final Map<Integer, Object> FIELD_METADATA = new HashMap<>();


    static {
    }

    private Object value;
    private short id;

    @ThriftConstructor
    public Nada() {
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

        Nada other = (Nada)o;

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
    }

    public void write0(TProtocol oprot) throws TException {
      oprot.writeStructBegin(STRUCT_DESC);
      if (this.id != 0 && this.value == null ){
         throw new TProtocolException("Cannot write a Union with marked-as-set but null value!");
      }
      switch (this.id) {
      default:
          throw new IllegalStateException("Cannot write union with unknown field ");
      }
      oprot.writeFieldStop();
      oprot.writeStructEnd();
    }
    
    public static Nada read0(TProtocol oprot) throws TException {
      Nada res = new Nada();
      res.value = null;
      res.id = (short) 0;
      oprot.readStructBegin(Nada.NAMES_TO_IDS, Nada.FIELD_METADATA);
      TField __field = oprot.readFieldBegin();
      if (__field.type != TType.STOP) {
          switch (__field.id) {
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
