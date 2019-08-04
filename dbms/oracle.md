---
layout: page
---

# Oracle Database

## SQLLoader

`.bat` file に以下を記述して実行することができる。

```bat
SQLLDR USERID=SOME/SOME@SOME CONTROL=LOAD.CTL,LOG=LOAD.LOG,BAD=LOAD.BAD,DATA=LOAD.CSV
```

## JDBC

* OCI : C で記述されたドライバ
* Thin : 100% Java で記述されたドライバ
* KPRB : 共有メモリ (SGA) にキャッシュされているデータを直接参照するドライバ。 非常に高速。
