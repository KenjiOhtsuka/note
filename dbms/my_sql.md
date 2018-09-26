---
layout: page
---

# MySQL

5.5.6 あたりから Timestamp がデフォルトで NOT NULL になった。


## Launch

```sh
mysql.server start
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
