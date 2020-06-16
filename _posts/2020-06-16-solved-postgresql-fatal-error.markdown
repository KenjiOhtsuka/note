---
layout: post
title: PostgreSQL - Solved - FATAL:  remaining connection slots are reserved for non-replication superuser connections
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
