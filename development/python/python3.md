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

## Get current directory

```python
import os
dir_path = os.path.dirname(os.path.realpath(__file__))
```

if using `os.path.dirname(__file__)`,
it may returns blank string when it is executed in the file directory.
