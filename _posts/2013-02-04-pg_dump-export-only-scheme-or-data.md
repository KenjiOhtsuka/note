---
layout: post
title: "pg_dump: テーブル構造のみ・データのみ出力"
date: 2013-02-04 00:00:00 +0900
tags: [postgresql, database, pg_dump]
categories: [postgresql, database]
---

<p>pg_dump でエクスポートする場合、 -s , -a のオプションをつけることで挙動が多少変わる。</p>
<h3>スキーマ情報のみを出力する場合</h3>

```
$ pg_dump DB_NAME -h HOSTNAME -t TABLE_NAME -U USER_NAME -s --file=OUTPUT_FILE_NAME
```

<h3>データのみをエクスポートする場合</h3>
<p>$ pg_dump DB_NAME -h HOSTNAME -t TABLE_NAME -U USER_NAME -a --file=OUTPUT_FILE_NAME</p>

<p>別のデータベースに似たような構造を作りたい場合などに使える。</p>

（コマンドは変更される可能性もあるので、postgresql のドキュメントを確認するのをおすすめします。）

<p>エクスポートしたものを実行するには `-f file_name` をつけて psql を実行する。`psql DB_NAME -U user_name -W -f FILE_NAME` のように。</p>

<h3>列追加</h3>
<p>列を追加する場合は次のようにしている。postgresだと既存の列の最後にしか列を追加できないみたいで。</p>
<p>テーブルスキーマとテーブルデータをエクスポートする。(別のファイルにしてやっているが、データとスキーマをまとめてエクスポートしてもOK。っていうかそのほうがいいと思う。)</p>

```sh
$ pg_dump DBNAME -h HOSTNAME -t TABLENAME -U USERNAME -a --file=20130212_data.sql
$ pg_dump DBNAME -h HOSTNAME -t TABLENAME -U USERNAME -s --file=20130212_schema.sql
```
<p>テーブルスキーマを変更する、テーブル削除のSQLを追加する</p>

```
$ vim 20130212_schema.sql
```

念のためバックアップを取得する

```
$ pg_dump DBNAME -h HOSTNAME -t TABLENAME -U USERNAME --file=20130212_backup.sql
```

テーブルを変更する

```
$ psql DBNAME -h HOSTNAME -U USERNAME -f 20130212_schema.sql
$ psql DBNAME -h HOSTNAME -U USERNAME -f 20130212_data.sql
```
