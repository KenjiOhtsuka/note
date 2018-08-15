---
layout: page
---

# Python

## dump data

```
import pickle

object = ...
with open("file.bin", 'wb') as f:
    pickle.dump(object, f)
```
