---
layout: page
---

# Rails

## Reset user's password

launch rails console.

```
user = User.find(1) # or something to get one user
user.unlock_access!
```
