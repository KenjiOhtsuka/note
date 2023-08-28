---
title: Oracle 使っていて postgresql にハマった
date: 2013-01-17 00:00:00 +0900
tags: [Oracle, postgresql]
categories: [database]
---

転職したので開発環境も変わり、データベースは oracle から postgresql になった。いくつか手間取った点をメモ。

## トランザクション

標準では postgresql は 自動コミット。そこで、手動コミットに切り替えるために psql でコマンドを入力する前に、`\set AUTOCOMMIT off` を実行する。AUTOCOMMIT は必ず大文字。これをやらないと ROLLBACK できない。DELETE コマンド の WHERE 句 とか間違えたら大変なのです。

## 接続

Oracle では、例えば `connect .../...@...` なんてことをやっていた。接続方法はいくつかあるけど。postgreでは `\connect db_name user_name` となるらしい。ただしこれだと `localhost` の `db` に接続することになる。リモートに接続する場合は
`\connect host_name db_name user_name` とする。

## DELETE

Oracle では `DELETE table_name ...` とやればよかったが、 postgresql は `DELETE FROM ...` と書かないと受け付けてくれない。

## DESC

mysql でも oracle でも `DESC table_name` でテーブル構造を見ることができた。mysql はセミコロンが必要だったかな？ postgresql では `\d table_name` と入力する。

## IS NULL

`IS NULL` は全部大文字じゃないと受け付けてくれない。Oracle も確か大文字小文字を区別していたように思うけど、以前開発していた環境では、設定を変更して大文字小文字を区別しないようにしていたから気にしていなかった。

## プロシージャ・ファンクション

プロシージャは PostgreSQL には存在しない。VB のサブプロシージャが Java ではファンクションになるような感じで、すべてファンクションで記述する。

文字列はクオート2つで囲む（クオート計4つ）。

PL/pgSQL ってのが PL/SQL に対応するものらしい。ただし、データベースサーバとは別に別途インストールしないと使えないみたい。

PL/pgSQL のプロシージャ（void を返すファンクション）はこんな書き方をする。

```
create or replace function sps_remove_the_same() 
returns void as $$
declare
  c1 cursor is
    select ...;
  cr1 record;
begin
  open c1;
  loop
    fetch c1 into cr1;
    if not found then
      exit;
    end if;
    delete ...;
  end loop;
  close c1;
end;
$$ language plpgsql;
```

Oracle では、コンパイル時に存在しない列を指定していたらエラーを出してくれたけど、postgres では実際にそのコードを実行するまでわからない。数値型のフィールドに文字列を入れる場合も同じことになる。

Oracle で ソースを見る場合は `SELECT TEXT FROM USER_SOURCE WHERE NAME=xxx ORDER BY LINE` で見える。PostgreSQL は `SELECT prosrc FROM pg_proc WHERE proname = '関数名'` って感じで確認できる。

## セッション一覧

Oracle だと、`v$session` ってのがある。これでセッションの一覧を見ることができる。postgre では、 `pg_stat_activity` っていうテーブルを見るとそれっぽいのが見えます。

## エクスポート

Oracle では `exp` で、MySQL では `mysqldump` でデータをエクスポートできる。postgresql では `pg_dump` というのを使う。 `pg_dump db_name [-t table+name] -U user_name [-v] [-W]` といった感じ。

`su - postgres` でユーザを変更しないと実行できなかった。

## SQLをファイルから実行

Oracle では SQL*Plus を開いて `@"C:\xxxxxx"` なんていう書き方で、ローカル環境にあるファイル内のSQLを実行できた。postgresql では `psql -f` で、サーバ内部にあるファイルは使えるみたい。

## 演算子

Oracle でも postgresql でも 文字列の結合には `||` が使える。

## コンソール

Oracle では sqlplus で `ed` と入力すれば、テキストエディタでのSQL編集が可能だった。postgresql では `psql` というコンソールがあり、そこで `\e` と入力すればテキストエディタでの編集が可能。そして、編集したテキストの保存と同時に実行される。Oracle では バックスラッシュを入力しないと実行されなかった気がする。

## COMMIT &amp; ROLLBACK

Oracle だと、`CREATE` などの DDL を実行するとそこで自動コミットされる。postgresql では、`CREATE`, `REPLACE` を行ってもCOMMITされない！ 安心と言えば安心だが、毎回COMMITをしていかないと今まで通りできないという・・・CREATE の後でコミットせずに SELECT文をいくつか発行して、ひとつでもエラーが出た場合、CREATE前の状態に戻ってやり直す必要があるのだ。
