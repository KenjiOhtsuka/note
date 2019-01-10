---
layout: page
---

# MySQL

5.5.6 あたりから Timestamp がデフォルトで NOT NULL になった。


## Launch

```sh
mysql.server start
```

## User

### Create

```sql
CREATE USER developer@'%' identified by 'password';
```

## Privilege

```sql
GRANT ALL PRIVILEGES ON db_name.* TO developer@'%';
```

## The server requested authentication method unknown to the client

### 認証プラグイン

* MySQL5.7までの認証プラグイン
    * mysql_native_password がデフォルト
* MySQL8.0より
    * caching_sha2_password。 SHA-256を使用した、より安全なパスワードの暗号化を提供するとともに、キャッシュを使用して同一ユーザの認証処理を高速化

```sh
create user developer@localhost identified by 'developer';
create user developer@localhost identified mysql_native_password by 'developer';
alter user developer@localhost identified mysql_native_password by 'developer';
```

```sh
GRANT ALL PRIVILEGES ON database_name.* TO 'developer'@'localhost';
```

## Text columns

* CHAR：255Bまでの固定長文字列
* VARCHAR：64KBまでの可変長文字列
* TINYTEXT：255Bまでの可変長文字列
* TEXT：64KBまでの可変長文字列
* MEDIUMTEXT：約1.6MBまでの可変長文字列
* LONGTEXT：約4.3GBまでの可変長文字列


参考: [【Rails】db:migrateでMySQLのLONGTEXT、MEDIUMTEXTを使う](http://appleorbit.hatenablog.com/entry/2015/02/24/231250)

Rails でマイグレーションする際には、 `:limit` の値によって column type を指定する。

## PHP による接続確認

```php
$connect = true;
$host = 'host';
$db_name = 'db_name';
$user = 'user';
$password = 'password';
$message = '';
try {
  $dbh = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $user, $password);
} catch (PDOException $e) {
  $connect = false;
  exit('Database connection failure ' .$e->getMessage());
  $message .= 'Database connection failure ' .$e->getMessage() .'';
}
if ($connect) {
  $message .= 'Database connection success!';
}
$dbh = null;
echo $message;
```
