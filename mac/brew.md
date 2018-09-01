---
layout: page
---

# Brew

```
==> mysql
We've installed your MySQL database without a root password. To secure it run:
    mysql_secure_installation

MySQL is configured to only allow connections from localhost by default

To connect run:
    mysql -uroot

To have launchd start mysql now and restart at login:
  brew services start mysql
Or, if you don't want/need a background service you can just run:
  mysql.server start
==> postgresql
To migrate existing data from a previous major version of PostgreSQL run:
  brew postgresql-upgrade-database

To have launchd start postgresql now and restart at login:
  brew services start postgresql
Or, if you don't want/need a background service you can just run:
  pg_ctl -D /usr/local/var/postgres start
```

## service

### Install

```sh
brew tap homebrew/services
```

### Register as Service

```sh
brew services start mysql
```

### Deregister as Service

```sh
brew services stop mysql
```

### List services

```sh
brew services stop mysql
```

## The server requested authentication method unknown to the client

### 認証プラグイン

* MySQL5.7までの認証プラグイン
    * mysql_native_password がデフォルト
* MySQL8.0より
    * caching_sha2_password。 SHA-256を使用した、より安全なパスワードの暗号化を提供するとともに、キャッシュを使用して同一ユーザの認証処理を高速化

```sh
create user developer@localhost identified by 'developer';
```

```sh
GRANT ALL PRIVILEGES ON database_name.* TO 'developer'@'localhost';
```