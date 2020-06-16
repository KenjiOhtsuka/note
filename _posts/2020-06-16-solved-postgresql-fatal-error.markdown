---
layout: post
title: "PostgreSQL - Solved - FATAL:  remaining connection slots are reserved for non-replication superuser connections"
categories: postgresql dbms error fatal
date: 2020-06-16 09:00:00 +09:00
---

PostgreSQL が次のエラーを出し始めたので、
プロセスを削除して急場を乗り切りました。

## 環境

PostgreSQL 9.5.10

## 現象

psql で接続を試みると、次のエラーが発生していました。

```
psql: error: could not connect to server: FATAL:  remaining connection slots are reserved for non-replication superuser connections
```

## やったこと

`ps -ef` をみると、 PostgreSQL 関連 のプロセスが大量に動いているのがわかる。

サーバにSSHでログインして、 postgres ユーザ でDBに接続。
問題なく接続できた。

動いている PostgreSQL のプロセスの確認。
SQLはインターネットでとりあえず見つけたものを使った。

```sql
SELECT user, pid, client_addr, waiting, query, query_start, NOW() - query_start AS elapsed
FROM pg_stat_activity
WHERE query != '<IDLE>' order by query_start;
```

```sql
SELECT
    procpid,
    start,
    now() - start AS lap,
    current_query
FROM
    (SELECT
        backendid,
        pg_stat_get_backend_pid(S.backendid) AS procpid,
        pg_stat_get_backend_activity_start(S.backendid) AS start,
        pg_stat_get_backend_activity(S.backendid) AS current_query
    FROM
        (SELECT pg_stat_get_backend_idset() AS backendid) AS S
    ) AS S
WHERE
    current_query <> ''
ORDER BY
    lap DESC;
```

問題なさそうなプロセスから消していった。

消すときは次の2つのSQLコマンドが使えるが、 `pg_cancel_backend` だと多分キャンセルOKな状態のものしかキャンセルできない。
`pg_terminate_backend` を使うこととなった。

```sql
SELECT pg_cancel_backend(process_id);
```

```sql
SELECT pg_terminate_backend(process_id);
```

いくつか消したところでDBに接続できるようになった。

優先的に削除したのは、2番目のSQLで次のように `START TRANSACTION;` と表示されていたもの。
たぶん `START TRANSACTION;` の実行で止まっていたとしたら、 まだなにも変更は行われていないだろうと。

```
   23624 | 2020-06-15 20:30:03.396778+09 | 13:20:48.396889         | START TRANSACTION;
   24164 | 2020-06-15 21:00:03.503046+09 | 12:50:48.290621         | START TRANSACTION;
   24165 | 2020-06-15 21:00:03.518704+09 | 12:50:48.274963         | START TRANSACTION;
   24167 | 2020-06-15 21:00:03.522438+09 | 12:50:48.271229         | START TRANSACTION;
   24166 | 2020-06-15 21:00:03.523716+09 | 12:50:48.269951         | START TRANSACTION;
   24694 | 2020-06-15 21:30:02.70439+09  | 12:20:49.089277         | START TRANSACTION;
   24695 | 2020-06-15 21:30:02.720112+09 | 12:20:49.073555         | START TRANSACTION;
   24696 | 2020-06-15 21:30:02.725209+09 | 12:20:49.068458         | START TRANSACTION;
   24697 | 2020-06-15 21:30:02.728767+09 | 12:20:49.0649           | START TRANSACTION;
   25320 | 2020-06-15 22:00:02.854174+09 | 11:50:48.939493         | START TRANSACTION;
   26318 | 2020-06-15 23:00:03.151547+09 | 10:50:48.64212          | START TRANSACTION;
   26320 | 2020-06-15 23:00:03.169473+09 | 10:50:48.624194         | START TRANSACTION;
   26319 | 2020-06-15 23:00:03.170017+09 | 10:50:48.62365          | START TRANSACTION;
   26321 | 2020-06-15 23:00:03.172524+09 | 10:50:48.621143         | START TRANSACTION;
```
