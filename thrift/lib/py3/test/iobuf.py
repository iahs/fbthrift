#!/usr/bin/env python3
import unittest

from folly.iobuf import IOBuf
from iobuf.types import Moo


class IOBufTests(unittest.TestCase):
    def test_hash(self) -> None:
        x = b"omg"
        y = b"wtf"
        xb = IOBuf(x)
        yb = IOBuf(y)
        hash(xb)
        self.assertNotEqual(hash(xb), hash(yb))
        self.assertEqual(hash(xb), hash(IOBuf(x)))

    def test_empty(self) -> None:
        x = b""
        xb = IOBuf(x)
        self.assertFalse(xb)
        self.assertEqual(len(xb), len(x))

    def test_iter(self) -> None:
        x = b"testtest"
        xb = IOBuf(x)
        self.assertEqual(b''.join(iter(xb)), x)

    def test_bytes(self) -> None:
        x = b"omgwtfbbq"
        xb = IOBuf(x)
        self.assertEqual(bytes(xb), x)

    def test_get_set_struct_field(self) -> None:
        m = Moo(val=3, ptr=IOBuf(b'abcdef'), buf=IOBuf(b'xyzzy'))
        m2 = Moo(val=3, ptr=IOBuf(b'abcdef'), buf=IOBuf(b'xyzzy'))
        self.assertEqual(m, m2)
        assert m.ptr is not None
        assert m2.ptr is not None

        self.assertEqual(bytes(m.ptr), bytes(m2.ptr))
        self.assertEqual(b'abcdef', bytes(m.ptr))

        self.assertEqual(bytes(m.buf), bytes(m2.buf))
        self.assertEqual(b'xyzzy', bytes(m.buf))
