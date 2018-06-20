#
# Autogenerated by Thrift
#
# DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
#  @generated
#

from libcpp.string cimport string
from libcpp cimport bool as cbool
from cpython cimport bool as pbool
from libc.stdint cimport int8_t, int16_t, int32_t, int64_t
from libcpp.memory cimport shared_ptr, unique_ptr
from libcpp.vector cimport vector
from libcpp.set cimport set as cset
from libcpp.map cimport map as cmap, pair as cpair
from thrift.py3.exceptions cimport cTException
from folly.iobuf cimport cIOBuf
from folly.iobuf cimport IOBuf as __IOBuf
cimport thrift.py3.exceptions
cimport thrift.py3.types
from folly.optional cimport cOptional




cdef extern from "src/gen-cpp2/module_types_custom_protocol.h" namespace "cpp2":
    # Forward Declaration
    cdef cppclass cComplexUnion "cpp2::ComplexUnion"
    # Forward Declaration
    cdef cppclass cVirtualComplexUnion "cpp2::VirtualComplexUnion"

cdef extern from "src/gen-cpp2/module_types.h" namespace "cpp2":
    cdef enum cComplexUnion__type "cpp2::ComplexUnion::Type":
        cComplexUnion__type___EMPTY__ "cpp2::ComplexUnion::Type::__EMPTY__",
        cComplexUnion__type_intValue "cpp2::ComplexUnion::Type::intValue",
        cComplexUnion__type_stringValue "cpp2::ComplexUnion::Type::stringValue",
        cComplexUnion__type_intListValue "cpp2::ComplexUnion::Type::intListValue",
        cComplexUnion__type_stringListValue "cpp2::ComplexUnion::Type::stringListValue",
        cComplexUnion__type_typedefValue "cpp2::ComplexUnion::Type::typedefValue",
        cComplexUnion__type_stringRef "cpp2::ComplexUnion::Type::stringRef",

    cdef cppclass cComplexUnion "cpp2::ComplexUnion":
        cComplexUnion() except +
        cComplexUnion(const cComplexUnion&) except +
        bint operator==(cComplexUnion&)
        cComplexUnion__type getType() const
        const int64_t& get_intValue() const
        int64_t& set_intValue(const int64_t&)
        const string& get_stringValue() const
        string& set_stringValue(const string&)
        const vector[int64_t]& get_intListValue() const
        vector[int64_t]& set_intListValue(const vector[int64_t]&)
        const vector[string]& get_stringListValue() const
        vector[string]& set_stringListValue(const vector[string]&)
        const cmap[int16_t,string]& get_typedefValue() const
        cmap[int16_t,string]& set_typedefValue(const cmap[int16_t,string]&)
        const unique_ptr[string]& get_stringRef() const
        unique_ptr[string]& set_stringRef(const string&)

    cdef enum cVirtualComplexUnion__type "cpp2::VirtualComplexUnion::Type":
        cVirtualComplexUnion__type___EMPTY__ "cpp2::VirtualComplexUnion::Type::__EMPTY__",
        cVirtualComplexUnion__type_thingOne "cpp2::VirtualComplexUnion::Type::thingOne",
        cVirtualComplexUnion__type_thingTwo "cpp2::VirtualComplexUnion::Type::thingTwo",

    cdef cppclass cVirtualComplexUnion "cpp2::VirtualComplexUnion":
        cVirtualComplexUnion() except +
        cVirtualComplexUnion(const cVirtualComplexUnion&) except +
        bint operator==(cVirtualComplexUnion&)
        cVirtualComplexUnion__type getType() const
        const string& get_thingOne() const
        string& set_thingOne(const string&)
        const string& get_thingTwo() const
        string& set_thingTwo(const string&)

    cdef shared_ptr[string] aliasing_constructor_stringRef "std::shared_ptr<std::string>"(shared_ptr[cComplexUnion]&, string*)

cdef extern from "<utility>" namespace "std" nogil:
    cdef shared_ptr[cComplexUnion] move(unique_ptr[cComplexUnion])
    cdef shared_ptr[cComplexUnion] move_shared "std::move"(shared_ptr[cComplexUnion])
    cdef unique_ptr[cComplexUnion] move_unique "std::move"(unique_ptr[cComplexUnion])
    cdef shared_ptr[cVirtualComplexUnion] move(unique_ptr[cVirtualComplexUnion])
    cdef shared_ptr[cVirtualComplexUnion] move_shared "std::move"(shared_ptr[cVirtualComplexUnion])
    cdef unique_ptr[cVirtualComplexUnion] move_unique "std::move"(unique_ptr[cVirtualComplexUnion])

cdef extern from "<memory>" namespace "std" nogil:
    cdef shared_ptr[const cComplexUnion] const_pointer_cast "std::const_pointer_cast<const cpp2::ComplexUnion>"(shared_ptr[cComplexUnion])
    cdef shared_ptr[const cVirtualComplexUnion] const_pointer_cast "std::const_pointer_cast<const cpp2::VirtualComplexUnion>"(shared_ptr[cVirtualComplexUnion])

# Forward Definition of the cython struct
cdef class ComplexUnion(thrift.py3.types.Union)

cdef class ComplexUnion(thrift.py3.types.Union):
    cdef object __hash
    cdef object __weakref__
    cdef shared_ptr[cComplexUnion] _cpp_obj
    cdef readonly object type
    cdef readonly object value
    cdef _load_cache(ComplexUnion self)

    @staticmethod
    cdef unique_ptr[cComplexUnion] _make_instance(
        cComplexUnion* base_instance,
        object intValue,
        object stringValue,
        object intListValue,
        object stringListValue,
        object typedefValue,
        object stringRef
    ) except *

    @staticmethod
    cdef create(shared_ptr[cComplexUnion])

# Forward Definition of the cython struct
cdef class VirtualComplexUnion(thrift.py3.types.Union)

cdef class VirtualComplexUnion(thrift.py3.types.Union):
    cdef object __hash
    cdef object __weakref__
    cdef shared_ptr[cVirtualComplexUnion] _cpp_obj
    cdef readonly object type
    cdef readonly object value
    cdef _load_cache(VirtualComplexUnion self)

    @staticmethod
    cdef unique_ptr[cVirtualComplexUnion] _make_instance(
        cVirtualComplexUnion* base_instance,
        object thingOne,
        object thingTwo
    ) except *

    @staticmethod
    cdef create(shared_ptr[cVirtualComplexUnion])


cdef class List__i64:
    cdef object __hash
    cdef object __weakref__
    cdef shared_ptr[vector[int64_t]] _cpp_obj
    @staticmethod
    cdef create(shared_ptr[vector[int64_t]])
    @staticmethod
    cdef unique_ptr[vector[int64_t]] _make_instance(object items) except *

cdef class List__string:
    cdef object __hash
    cdef object __weakref__
    cdef shared_ptr[vector[string]] _cpp_obj
    @staticmethod
    cdef create(shared_ptr[vector[string]])
    @staticmethod
    cdef unique_ptr[vector[string]] _make_instance(object items) except *

cdef class Map__i16_string:
    cdef object __hash
    cdef object __weakref__
    cdef shared_ptr[cmap[int16_t,string]] _cpp_obj
    @staticmethod
    cdef create(shared_ptr[cmap[int16_t,string]])
    @staticmethod
    cdef unique_ptr[cmap[int16_t,string]] _make_instance(object items) except *

cdef extern from "<utility>" namespace "std" nogil:
    cdef shared_ptr[vector[int64_t]] move(unique_ptr[vector[int64_t]])
    cdef unique_ptr[vector[int64_t]] move_unique "std::move"(unique_ptr[vector[int64_t]])
    cdef shared_ptr[vector[string]] move(unique_ptr[vector[string]])
    cdef unique_ptr[vector[string]] move_unique "std::move"(unique_ptr[vector[string]])
    cdef shared_ptr[cmap[int16_t,string]] move(unique_ptr[cmap[int16_t,string]])
    cdef unique_ptr[cmap[int16_t,string]] move_unique "std::move"(unique_ptr[cmap[int16_t,string]])
cdef extern from "<memory>" namespace "std" nogil:
    cdef shared_ptr[const vector[int64_t]] const_pointer_cast "std::const_pointer_cast<const std::vector<int64_t>>"(shared_ptr[vector[int64_t]])

    cdef shared_ptr[const vector[string]] const_pointer_cast "std::const_pointer_cast<const std::vector<std::string>>"(shared_ptr[vector[string]])

    cdef shared_ptr[const cmap[int16_t,string]] const_pointer_cast "std::const_pointer_cast<const std::map<int16_t,std::string>>"(shared_ptr[cmap[int16_t,string]])

