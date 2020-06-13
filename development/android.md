---
layout: page
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
