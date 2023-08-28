---
title: Oracle 使っていて postgresql にハマった
date: 2013-01-17 00:00:00 +0900
tags: [Oracle, postgresql]
categories: [database]
---

<p>転職したので開発環境も変わり、データベースは oracle から postgresql になった。いくつか手間取った点をメモ。</p>
<h3>トランザクション</h3>
<p>標準では postgresql は 自動コミット。そこで、手動コミットに切り替えるために psql でコマンドを入力する前に、\set AUTOCOMMIT off を実行する。AUTOCOMMIT は必ず大文字。これをやらないと ROLLBACK できない。DELETE コマンド の WHERE 句 とか間違えたら大変なのです。</p>
<h3>接続</h3>

Oracle では、例えば `connect .../...@...` なんてことをやっていた。接続方法はいくつかあるけど。postgreでは `\connect db_name user_name` となるらしい。ただしこれだと `localhost` の `db` に接続することになる。リモートに接続する場合は
`\connect host_name db_name user_name` とする。

<h3>DELETE</h3>
<p>Oracle では `DELETE table_name ...` とやればよかったが、 postgresql は `DELETE FROM ...` と書かないと受け付けてくれない。</p>
<h3>DESC</h3>
<p>mysql でも oracle でも `DESC table_name` でテーブル構造を見ることができた。mysql はセミコロンが必要だったかな？ postgresql では `\d table_name` と入力する。</p>
<h3>IS NULL</h3>
<p>`IS NULL` は全部大文字じゃないと受け付けてくれない。Oracle も確か大文字小文字を区別していたように思うけど、以前開発していた環境では、設定を変更して大文字小文字を区別しないようにしていたから気にしていなかった。</p>
<h3>プロシージャ・ファンクション</h3>
<p>プロシージャは PostgreSQL には存在しない。VB のサブプロシージャが Java ではファンクションになるような感じで、すべてファンクションで記述する。</p>
<p>文字列はクオート2つで囲む（クオート計4つ）。</p>
<p>PL/pgSQL ってのが PL/SQL に対応するものらしい。ただし、データベースサーバとは別に別途インストールしないと使えないみたい。</p>
<p>PL/pgSQL のプロシージャ（void を返すファンクション）はこんな書き方をする。</p>

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

<p>Oracle では、コンパイル時に存在しない列を指定していたらエラーを出してくれたけど、postgres では実際にそのコードを実行するまでわからない。数値型のフィールドに文字列を入れる場合も同じことになる。</p>
<p>Oracle で ソースを見る場合は `SELECT TEXT FROM USER_SOURCE WHERE NAME=xxx ORDER BY LINE` で見える。PostgreSQL は `SELECT prosrc FROM pg_proc WHERE proname = '関数名'` って感じで確認できる。</p>
<h3>セッション一覧</h3>
<p>Oracle だと、`v$session` ってのがある。これでセッションの一覧を見ることができる。postgre では、 `pg_stat_activity` っていうテーブルを見るとそれっぽいのが見えます。</p>
<h3>エクスポート</h3>
<p>Oracle では `exp` で、MySQL では `mysqldump` でデータをエクスポートできる。postgresql では `pg_dump` というのを使う。 `pg_dump db_name [-t table+name] -U user_name [-v] [-W]` といった感じ。</p>
<p>`su - postgres` でユーザを変更しないと実行できなかった。</p>
<h3>SQLをファイルから実行</h3>

Oracle では SQL*Plus を開いて `@"C:\xxxxxx"` なんていう書き方で、ローカル環境にあるファイル内のSQLを実行できた。postgresql では `psql -f` で、サーバ内部にあるファイルは使えるみたい。

<h3>演算子</h3>
<p>Oracle でも postgresql でも 文字列の結合には `||` が使える。</p>
<h3>コンソール</h3>
<p>Oracle では sqlplus で `ed` と入力すれば、テキストエディタでのSQL編集が可能だった。postgresql では `psql` というコンソールがあり、そこで `\e` と入力すればテキストエディタでの編集が可能。そして、編集したテキストの保存と同時に実行される。Oracle では バックスラッシュを入力しないと実行されなかった気がする。</p>
<h3>COMMIT &amp; ROLLBACK</h3>
<p>Oracle だと、`CREATE` などの DDL を実行するとそこで自動コミットされる。postgresql では、`CREATE`, `REPLACE` を行ってもCOMMITされない！ 安心と言えば安心だが、毎回COMMITをしていかないと今まで通りできないという・・・CREATE の後でコミットせずに SELECT文をいくつか発行して、ひとつでもエラーが出た場合、CREATE前の状態に戻ってやり直す必要があるのだ。</p>
