---
layout: page
---

# Windows command prompt commands

## Equivalent command to Linux touch

```cmd
TYPE NUL >> file.path
```

## Process every file

```cmd
for %f in (*.jpg) do ( TYPE NUL > ..\photos\%f  )
```

`%f` is OK, but `%ff` is not.
`%` + (one letter) makes sense.
