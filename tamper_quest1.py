#!/usr/bin/env python

"""
Copyright (c) 2019 - numan turle
"""

from lib.core.convert import encodeBase64
from lib.core.enums import PRIORITY

__priority__ = PRIORITY.LOW

def dependencies():
    pass

def tamper(payload, **kwargs):
    payload = "veri|" + payload
    return encodeBase64(payload, binary=False) if payload else payload
