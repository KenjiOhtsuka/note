---
layout: page
---

# PostgreSQL

## Installation

### Mac

```sh
brew install postgresql
postgres -D /usr/local/var/postgres
```

* [PostgreSQLの環境をmacのローカルに作成＆SQL操作（＆ついでにDataGripへの接続）](https://qiita.com/ysdyt/items/64ed98b420ea5c4e52ec)

### Login as root user

#### Mac

```sh
psql postgres
```

#### Linux

```sh
sudo su - postgres
psql
```

### Create Account

```sql
CREATE USER user_name WITH LOGIN CREATEDB PASSWORD 'XXXXXXXXXX';
```

### Create Database

```sh
create database dbname 
CREATE DATABASE dbname OWNER rolename;
```

### Add User to Group (Other Role)

```sql
GRANT group_name TO user_name;
```

### Create Database

```sql
CREATE DATABASE sample
  WITH OWNER = role_name
       ENCODING = 'UTF8'
       TABLESPACE = pg_default
       CONNECTION LIMIT = -1;
```

### Grant ALL

```sh
postgres=> create database db_name;
CREATE DATABASE
postgres=> create user user_name With login password 'password';
CREATE ROLE
postgres=> grant all on database db_name to user_mame;
GRANT
```



```
GRANT postgres to role_name;
```

```
REVOKE postgres from role_name;
```

```sql
CREATE ROLE group_name WITH NOLOGIN;
CREATE USER role_name WITH LOGIN PASSWORD 'XXXXXXX' INHERIT;
```

```sql
GRANT SELECT ON all tables IN SCHEMA public to group_name;
```

```sql
CREATE ROLE test_user WITH LOGIN CREATEDB PASSWORD 'test_user';
```

```sql
GRANT test_group TO test_user;
```

```sql
CREATE DATABASE sample
  WITH OWNER = test_user
       ENCODING = 'UTF8'
       TABLESPACE = pg_default
       CONNECTION LIMIT = -1;
```

```bash
pg_restore -j 2 --dbname sample -U postgres -h <<hostname>> --role=test_user -O XXXXXXimportfileXXXXXXXX
```

## Meta Command

### ユーザ名を切り替える

#### 同じデータベース

```
\connect - user_name
```

#### 別のデータベース

```
\connect database_name user_name
```
