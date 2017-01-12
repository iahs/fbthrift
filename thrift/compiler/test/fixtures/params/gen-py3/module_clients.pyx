#
# Autogenerated by Thrift
#
# DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
#  @generated
#
from libcpp.memory cimport shared_ptr, make_shared, unique_ptr, make_unique
from libcpp.string cimport string
from libcpp cimport bool as cbool
from cpython cimport bool as pbool
from libc.stdint cimport int8_t, int16_t, int32_t, int64_t
from libcpp.vector cimport vector as vector
from libcpp.set cimport set as cset
from libcpp.map cimport map as cmap
from cython.operator cimport dereference as deref
from cpython.ref cimport PyObject
from thrift.lib.py3.thrift_client cimport EventBase, make_py3_client, py3_get_exception
from thrift.lib.py3.thrift_client import get_event_base
from thrift.lib.py3.folly cimport cFollyEventBase, cFollyTry, cFollyUnit, c_unit

import asyncio
import sys
import traceback

cimport py3.module_types
from py3.module_clients_wrapper cimport move

from py3.module_clients_wrapper cimport cNestedContainersAsyncClient, cNestedContainersClientWrapper


cdef void made_NestedContainers_py3_client_callback(
        PyObject* future,
        cFollyTry[unique_ptr[cNestedContainersClientWrapper]] result) with gil:
    cdef object pyfuture = <object> future
    if result.hasException():
        try:
            result.exception().throwException()
        except:
            pyfuture.loop.call_soon_threadsafe(pyfuture.set_exception, sys.exc_info()[1])
    else:
        pyclient = NestedContainersClient(pyfuture.loop)
        pyclient._client = move(result.value())
        pyfuture.loop.call_soon_threadsafe(pyfuture.set_result, pyclient)

cdef void NestedContainers_mapList_callback(
        PyObject* future,
        cFollyTry[cFollyUnit] result) with gil:
    cdef object pyfuture = <object> future
    cdef cFollyUnit citem
    if result.hasException():
        try:
            result.exception().throwException()
        except:
            pyfuture.loop.call_soon_threadsafe(pyfuture.set_exception, sys.exc_info()[1])
    else:
        citem = c_unit;
        pyfuture.loop.call_soon_threadsafe(pyfuture.set_result, None)

cdef void NestedContainers_mapSet_callback(
        PyObject* future,
        cFollyTry[cFollyUnit] result) with gil:
    cdef object pyfuture = <object> future
    cdef cFollyUnit citem
    if result.hasException():
        try:
            result.exception().throwException()
        except:
            pyfuture.loop.call_soon_threadsafe(pyfuture.set_exception, sys.exc_info()[1])
    else:
        citem = c_unit;
        pyfuture.loop.call_soon_threadsafe(pyfuture.set_result, None)

cdef void NestedContainers_listMap_callback(
        PyObject* future,
        cFollyTry[cFollyUnit] result) with gil:
    cdef object pyfuture = <object> future
    cdef cFollyUnit citem
    if result.hasException():
        try:
            result.exception().throwException()
        except:
            pyfuture.loop.call_soon_threadsafe(pyfuture.set_exception, sys.exc_info()[1])
    else:
        citem = c_unit;
        pyfuture.loop.call_soon_threadsafe(pyfuture.set_result, None)

cdef void NestedContainers_listSet_callback(
        PyObject* future,
        cFollyTry[cFollyUnit] result) with gil:
    cdef object pyfuture = <object> future
    cdef cFollyUnit citem
    if result.hasException():
        try:
            result.exception().throwException()
        except:
            pyfuture.loop.call_soon_threadsafe(pyfuture.set_exception, sys.exc_info()[1])
    else:
        citem = c_unit;
        pyfuture.loop.call_soon_threadsafe(pyfuture.set_result, None)

cdef void NestedContainers_turtles_callback(
        PyObject* future,
        cFollyTry[cFollyUnit] result) with gil:
    cdef object pyfuture = <object> future
    cdef cFollyUnit citem
    if result.hasException():
        try:
            result.exception().throwException()
        except:
            pyfuture.loop.call_soon_threadsafe(pyfuture.set_exception, sys.exc_info()[1])
    else:
        citem = c_unit;
        pyfuture.loop.call_soon_threadsafe(pyfuture.set_result, None)


cdef class NestedContainersClient:
    cdef unique_ptr[cNestedContainersClientWrapper] _client
    cdef object loop

    def __cinit__(self, loop):
        self.loop = loop

    @staticmethod
    async def make_client(bytes host, int port, loop=None):
        if loop is None:
           loop = asyncio.get_event_loop()
        future = loop.create_future()
        future.loop = loop
        eb = await get_event_base(loop)
        make_py3_client[cNestedContainersAsyncClient, cNestedContainersClientWrapper](
            (<EventBase> eb)._folly_event_base,
            host,
            port,
            0,
            made_NestedContainers_py3_client_callback,
            future)
        return await future

    def mapList(
            self,
            arg_foo):
        future = self.loop.create_future()
        future.loop = self.loop
        deref(self._client).mapList(
            deref((<py3.module_types.Map__i32_List__i32>arg_foo)._map),
            NestedContainers_mapList_callback,
            future)
        return future

    def mapSet(
            self,
            arg_foo):
        future = self.loop.create_future()
        future.loop = self.loop
        deref(self._client).mapSet(
            deref((<py3.module_types.Map__i32_Set__i32>arg_foo)._map),
            NestedContainers_mapSet_callback,
            future)
        return future

    def listMap(
            self,
            arg_foo):
        future = self.loop.create_future()
        future.loop = self.loop
        deref(self._client).listMap(
            deref((<py3.module_types.List__Map__i32_i32>arg_foo)._vector),
            NestedContainers_listMap_callback,
            future)
        return future

    def listSet(
            self,
            arg_foo):
        future = self.loop.create_future()
        future.loop = self.loop
        deref(self._client).listSet(
            deref((<py3.module_types.List__Set__i32>arg_foo)._vector),
            NestedContainers_listSet_callback,
            future)
        return future

    def turtles(
            self,
            arg_foo):
        future = self.loop.create_future()
        future.loop = self.loop
        deref(self._client).turtles(
            deref((<py3.module_types.List__List__Map__i32_Map__i32_Set__i32>arg_foo)._vector),
            NestedContainers_turtles_callback,
            future)
        return future

