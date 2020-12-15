---
layout: page
---

## Dynamic Relocation

* hardware-based address translation
* 2 registers
    * base register
    * bounds (limit) register
        * If a process generates a virtual address that is greater than the bounds, or one that is negative, the
CPU will raise an exception, and the process will likely be terminated.



## Segment

Value: base and logical pair

* three logically-different segments:
    * code
    * stack
    * heap: **grow backwards**
    
* OS places each segment in different parts of physical memory
    * avoid filling physical memory with unused virtual address space.
