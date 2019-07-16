---
layout: post
title:  "Make PostgreSQL work"
date:   2019-07-16 14:52:48 +0900
categories: jekyll update
---

# macOS で動かなくなっていた PostgreSQL を動くようにした。

## 現象

次のように　PostgreSQL を起動しようとしたが動かなかった。

```sh
% pg_ctl -D /usr/local/var/postgres -l /usr/local/var/postgres/server.log start

waiting for server to start.... stopped waiting
pg_ctl: could not start server
Examine the log output.
```

## 解決させた方法

下記のようにディレクトリを作成する。

```
mkdir /usr/local/var/postgres/pg_tblspc
mkdir /usr/local/var/postgres/pg_replslot
mkdir /usr/local/var/postgres/pg_twophase
mkdir /usr/local/var/postgres/pg_stat
mkdir /usr/local/var/postgres/pg_snapshots
mkdir /usr/local/var/postgres/pg_commit_ts
mkdir /usr/local/var/postgres/pg_logical/snapshots
mkdir /usr/local/var/postgres/pg_logical/mappings
```

## 解決に至る経緯

`/usr/local/var/postgres/server.log` を確認。

```
2019-07-16 15:18:09.111 JST [65987] LOG:  listening on IPv4 address "127.0.0.1", port 5432
2019-07-16 15:18:09.112 JST [65987] LOG:  listening on IPv6 address "::1", port 5432
2019-07-16 15:18:09.112 JST [65987] LOG:  listening on Unix socket "/tmp/.s.PGSQL.5432"
2019-07-16 15:18:09.129 JST [65987] LOG:  could not open directory "pg_tblspc": No such file or directory
2019-07-16 15:18:09.132 JST [65988] LOG:  database system was interrupted; last known up at 2019-05-08 07:56:43 JST
2019-07-16 15:18:09.408 JST [65988] LOG:  could not open directory "pg_tblspc": No such file or directory
2019-07-16 15:18:09.408 JST [65988] LOG:  could not open directory "pg_tblspc": No such file or directory
2019-07-16 15:18:09.408 JST [65988] FATAL:  could not open directory "pg_replslot": No such file or directory
2019-07-16 15:18:09.408 JST [65987] LOG:  startup process (PID 65988) exited with exit code 1
2019-07-16 15:18:09.408 JST [65987] LOG:  aborting startup due to startup process failure
2019-07-16 15:18:09.410 JST [65987] LOG:  database system is shut down
2019-07-16 15:18:57.045 JST [66742] LOG:  listening on IPv4 address "127.0.0.1", port 5432
2019-07-16 15:18:57.045 JST [66742] LOG:  listening on IPv6 address "::1", port 5432
2019-07-16 15:18:57.046 JST [66742] LOG:  listening on Unix socket "/tmp/.s.PGSQL.5432"
2019-07-16 15:18:57.069 JST [66742] LOG:  could not open directory "pg_tblspc": No such file or directory
2019-07-16 15:18:57.074 JST [66743] LOG:  database system was interrupted; last known up at 2019-05-08 07:56:43 JST
2019-07-16 15:18:57.341 JST [66743] LOG:  could not open directory "pg_tblspc": No such file or directory
2019-07-16 15:18:57.344 JST [66743] LOG:  could not open directory "pg_tblspc": No such file or directory
2019-07-16 15:18:57.344 JST [66743] FATAL:  could not open directory "pg_replslot": No such file or directory
2019-07-16 15:18:57.345 JST [66742] LOG:  startup process (PID 66743) exited with exit code 1
2019-07-16 15:18:57.345 JST [66742] LOG:  aborting startup due to startup process failure
2019-07-16 15:18:57.346 JST [66742] LOG:  database system is shut down
```

存在しないディレクトリを作成すれば動くっぽいのでやってみた。

```sh
mkdir /usr/local/var/postgres/pg_tblspc
mkdir /usr/local/var/postgres/pg_replslot
```

再度やってみるも、起動に失敗するのでログ再確認。

```
2019-07-16 15:31:56.188 JST [67180] LOG:  listening on IPv4 address "127.0.0.1", port 5432
2019-07-16 15:31:56.188 JST [67180] LOG:  listening on IPv6 address "::1", port 5432
2019-07-16 15:31:56.189 JST [67180] LOG:  listening on Unix socket "/tmp/.s.PGSQL.5432"
2019-07-16 15:31:56.244 JST [67181] LOG:  database system was interrupted; last known up at 2019-05-08 07:56:43 JST
2019-07-16 15:31:56.724 JST [67181] FATAL:  could not open directory "pg_twophase": No such file or directory
2019-07-16 15:31:56.724 JST [67180] LOG:  startup process (PID 67181) exited with exit code 1
2019-07-16 15:31:56.724 JST [67180] LOG:  aborting startup due to startup process failure
2019-07-16 15:31:56.726 JST [67180] LOG:  database system is shut down
```

追加でディレクトリ作成。

```sh
mkdir /usr/local/var/postgres/pg_twophase
```

しかしまだエラー。

```
2019-07-16 15:34:02.086 JST [67233] LOG:  listening on IPv4 address "127.0.0.1", port 5432
2019-07-16 15:34:02.087 JST [67233] LOG:  listening on IPv6 address "::1", port 5432
2019-07-16 15:34:02.088 JST [67233] LOG:  listening on Unix socket "/tmp/.s.PGSQL.5432"
2019-07-16 15:34:02.155 JST [67234] LOG:  database system was interrupted; last known up at 2019-05-08 07:56:43 JST
2019-07-16 15:34:02.557 JST [67234] LOG:  database system was not properly shut down; automatic recovery in progress
2019-07-16 15:34:02.561 JST [67234] FATAL:  could not open directory "pg_stat": No such file or directory
2019-07-16 15:34:02.561 JST [67233] LOG:  startup process (PID 67234) exited with exit code 1
2019-07-16 15:34:02.561 JST [67233] LOG:  aborting startup due to startup process failure
2019-07-16 15:34:02.563 JST [67233] LOG:  database system is shut down
```

ディレクトリ作成

```sh
mkdir /usr/local/var/postgres/pg_stat
```

ログ。

```
2019-07-16 15:34:58.835 JST [67263] LOG:  listening on IPv4 address "127.0.0.1", port 5432
2019-07-16 15:34:58.835 JST [67263] LOG:  listening on IPv6 address "::1", port 5432
2019-07-16 15:34:58.837 JST [67263] LOG:  listening on Unix socket "/tmp/.s.PGSQL.5432"
2019-07-16 15:34:58.882 JST [67264] LOG:  database system was interrupted while in recovery at 2019-07-16 15:34:02 JST
2019-07-16 15:34:58.882 JST [67264] HINT:  This probably means that some data is corrupted and you will have to use the last backup for recovery.
2019-07-16 15:34:59.363 JST [67264] LOG:  database system was not properly shut down; automatic recovery in progress
2019-07-16 15:34:59.372 JST [67264] LOG:  could not open directory "pg_snapshots": No such file or directory
2019-07-16 15:34:59.373 JST [67264] LOG:  redo starts at 6/8D6EB4A8
2019-07-16 15:34:59.374 JST [67264] LOG:  invalid record length at 6/8D6ED320: wanted 24, got 0
2019-07-16 15:34:59.374 JST [67264] LOG:  redo done at 6/8D6ED2E8
2019-07-16 15:34:59.391 JST [67264] PANIC:  could not open file "pg_commit_ts": No such file or directory
2019-07-16 15:34:59.392 JST [67263] LOG:  startup process (PID 67264) was terminated by signal 6: Abort trap
2019-07-16 15:34:59.392 JST [67263] LOG:  aborting startup due to startup process failure
2019-07-16 15:34:59.393 JST [67263] LOG:  database system is shut down
```

コマンド

```sh
mkdir /usr/local/var/postgres/pg_snapshots
```

ログ

```
2019-07-16 15:36:21.518 JST [67302] LOG:  listening on IPv4 address "127.0.0.1", port 5432
2019-07-16 15:36:21.518 JST [67302] LOG:  listening on IPv6 address "::1", port 5432
2019-07-16 15:36:21.519 JST [67302] LOG:  listening on Unix socket "/tmp/.s.PGSQL.5432"
2019-07-16 15:36:21.540 JST [67303] LOG:  database system shutdown was interrupted; last known up at 2019-07-16 15:34:59 JST
2019-07-16 15:36:21.829 JST [67303] LOG:  database system was not properly shut down; automatic recovery in progress
2019-07-16 15:36:21.837 JST [67303] LOG:  redo starts at 6/8D6EB4A8
2019-07-16 15:36:21.837 JST [67303] LOG:  invalid record length at 6/8D6ED320: wanted 24, got 0
2019-07-16 15:36:21.837 JST [67303] LOG:  redo done at 6/8D6ED2E8
2019-07-16 15:36:21.856 JST [67303] PANIC:  could not open file "pg_commit_ts": No such file or directory
2019-07-16 15:36:21.856 JST [67302] LOG:  startup process (PID 67303) was terminated by signal 6: Abort trap
2019-07-16 15:36:21.856 JST [67302] LOG:  aborting startup due to startup process failure
2019-07-16 15:36:21.857 JST [67302] LOG:  database system is shut down
```

コマンド

```sh
mkdir /usr/local/var/postgres/pg_commit_ts
```

ログ

```sh
019-07-16 16:18:57.359 JST [68262] LOG:  listening on IPv4 address "127.0.0.1", port 5432
2019-07-16 16:18:57.360 JST [68262] LOG:  listening on IPv6 address "::1", port 5432
2019-07-16 16:18:57.361 JST [68262] LOG:  listening on Unix socket "/tmp/.s.PGSQL.5432"
2019-07-16 16:18:57.412 JST [68263] LOG:  database system shutdown was interrupted; last known up at 2019-07-16 15:56:17 JST
2019-07-16 16:18:57.835 JST [68263] LOG:  database system was not properly shut down; automatic recovery in progress
2019-07-16 16:18:57.845 JST [68263] LOG:  redo starts at 6/8D6EB4A8
2019-07-16 16:18:57.847 JST [68263] LOG:  invalid record length at 6/8D6ED320: wanted 24, got 0
2019-07-16 16:18:57.847 JST [68263] LOG:  redo done at 6/8D6ED2E8
2019-07-16 16:18:57.866 JST [68263] FATAL:  could not open directory "pg_logical/snapshots": No such file or directory
2019-07-16 16:18:57.867 JST [68262] LOG:  startup process (PID 68263) exited with exit code 1
2019-07-16 16:18:57.867 JST [68262] LOG:  aborting startup due to startup process failure
2019-07-16 16:18:57.870 JST [68262] LOG:  database system is shut down
```

コマンド

```sh
mkdir /usr/local/var/postgres/pg_logical/snapshots
```

ログ

```
2019-07-16 16:20:19.389 JST [68302] LOG:  listening on IPv4 address "127.0.0.1", port 5432
2019-07-16 16:20:19.389 JST [68302] LOG:  listening on IPv6 address "::1", port 5432
2019-07-16 16:20:19.390 JST [68302] LOG:  listening on Unix socket "/tmp/.s.PGSQL.5432"
2019-07-16 16:20:19.416 JST [68303] LOG:  database system shutdown was interrupted; last known up at 2019-07-16 16:18:57 JST
2019-07-16 16:20:19.697 JST [68303] LOG:  database system was not properly shut down; automatic recovery in progress
2019-07-16 16:20:19.706 JST [68303] LOG:  redo starts at 6/8D6EB4A8
2019-07-16 16:20:19.707 JST [68303] LOG:  invalid record length at 6/8D6ED320: wanted 24, got 0
2019-07-16 16:20:19.707 JST [68303] LOG:  redo done at 6/8D6ED2E8
2019-07-16 16:20:19.727 JST [68303] FATAL:  could not open directory "pg_logical/mappings": No such file or directory
2019-07-16 16:20:19.728 JST [68302] LOG:  startup process (PID 68303) exited with exit code 1
2019-07-16 16:20:19.728 JST [68302] LOG:  aborting startup due to startup process failure
2019-07-16 16:20:19.730 JST [68302] LOG:  database system is shut down
```

コマンド

```sh
mkdir /usr/local/var/postgres/pg_logical/mappings
```

そして成功

```
 % pg_ctl -D /usr/local/var/postgres -l /usr/local/var/postgres/server.log start
 
waiting for server to start.... done
server started
```

## 関連

* [Yosemiteにアップグレードしたらpostgresが起動しないよ＞＜](https://qiita.com/ms2sato/items/10b9e9c5a98d50f5954d)
* [macos+homebrew+postgres で接続エラー「PG::ConnectionBad: 〜"/tmp/.s.PGSQL.5432"?」を解決](https://qiita.com/hirocueki2/items/327dc6e87005edf622ad)

## 環境

* macOS Mojave
