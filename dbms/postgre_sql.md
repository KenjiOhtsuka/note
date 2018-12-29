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

```sql
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

```sql
CREATE ROLE group_name WITH NOLOGIN;
CREATE USER role_name WITH LOGIN PASSWORD 'XXXXXXX' INHERIT;
```

* Grant select all table or something in the database, or revoke
    * login to the database
    * Execute ddl
        ```sql
        GRANT SELECT ON all tables IN SCHEMA public to role_name;
        ```
         ```sql
        CREATE ROLE test_user WITH LOGIN CREATEDB PASSWORD 'test_user';
        ```
        ```sql
        GRANT test_group TO test_user;
        REVOKE test_group FROM test_user;
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

### Show connection info

```
\conninfo
```

### ユーザ名を切り替える

#### 同じデータベース

```sql
\connect - user_name
```

#### 別のデータベース

```sql
\connect database_name user_name
```

### 再実行

```sql
\g
```

## UPSERT

制約(Constraint)がある場合に使用可能。
CONFLICT が生じるときに UPDATE にする。

## FUNCTION

* See code
    ```sql
    SELECT routine_definition 
      FROM information_schema.routines 
     WHERE specific_schema LIKE 'public'
       AND routine_name LIKE 'functionName';
    ```

## Reference

* stackoverflow. (2014). _How to display the function, procedure, triggers source code in postgresql?_ Retrieved from https://stackoverflow.com/questions/6898453/how-to-display-the-function-procedure-triggers-source-code-in-postgresql
