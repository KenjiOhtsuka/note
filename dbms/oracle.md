---
layout: page
title: Oracle Database
---

## SQLLoader

`.bat` file に以下を記述して実行することができる。

```bat
SQLLDR USERID=SOME/SOME@SOME CONTROL=LOAD.CTL,LOG=LOAD.LOG,BAD=LOAD.BAD,DATA=LOAD.CSV
```

## JDBC

* OCI : C で記述されたドライバ
* Thin : 100% Java で記述されたドライバ
* KPRB : 共有メモリ (SGA) にキャッシュされているデータを直接参照するドライバ。 非常に高速。

## SQL*Plus システム変数

| SET Variable | Description |
|--|--|
| SET TIMING | 時間の計測 |
| SET LINESIZE | 1行に表示するバイト数の設定 |
| SET PAGESIZE | 1ページの行数 |
| SET HEADING | 列ヘッダの表示・非表示 |
| SET COLSEP | 区切り文字設定 |
| SET TRIMSPOOL | 行末の空白文字出力 |
| SET SERVEROUTPUT | 標準出力への表示・非表示 |

### 実行時間計測

```
SQL> SET TIMING ON
SQL> -- 処理実行 --
SQL> 経過：00:00:00:10
```

