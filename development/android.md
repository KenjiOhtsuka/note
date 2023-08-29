---
layout: page
title: Android
---

## Signing with key

```
keytool -genkey -v -keystore name.keystore -alias alias_name -keyalg RSA -keysize 2048 -validity 10000
```

```
jarsigner -verbose -keystore name.keystore release_app.aab alias-name
```

## Flutter

* build for release

  ```
  flutter build bundle --release
  ```

### icon

* https://qiita.com/rkowase/items/e0f3f8aec207ed8567aa
