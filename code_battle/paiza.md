---
layout: page
---


```python
def read_arg():
    return input().rstrip()

def read_int():
    return int(read_arg())

def read_arg_list(delimiter=' '):
    return read_arg().split()

def read_int_list(delimiter=' '):
    return [int(i) for i in read_arg_list(delimiter)]
```
