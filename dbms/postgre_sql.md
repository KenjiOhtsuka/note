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
create database dbname;
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
    * login to the database, first
    * Execute ddl
        ```sql
        GRANT SELECT ON all tables IN SCHEMA public to role_name;
        ```
        権限追加後に作成されるテーブルには、自動的に権限がつかないので注意。
        (The user can't access new tables added after executing `GRANT` SQL.)
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

### Other Grant Pattern

```sql
GRANT CONNECT ON DATABASE table_name TO username;
```

```sql
GRANT USAGE ON SCHEMA public TO username;
```

* for specific tables
    ```sql
    GRANT SELECT ON table_name TO username;
    GRANT SELECT ON ALL TABLES IN SCHEMA public TO username;
    ```
* To add access to the new tables in the future automatically
    ```sql
    ALTER DEFAULT PRIVILEGES IN SCHEMA public
    GRANT SELECT ON TABLES TO username;
    ```
## Configuration

### Locale

* initdb実行時にロケールを指定していなければ、OSに設定されているロケールが使用される。
* ロケールは停止しないと変更できない。

### Encoding

* デフォルトでは sql_ascii
* sql_ascii ではターミナルでマルチバイト文字を入力できない

## Meta Command

### Show connection info

```
\conninfo
```

### change user, connect to the database

#### to the same database

```sql
\connect - user_name
```

#### to another database

```sql
\connect database_name user_name
```

### Re-execution

```sql
\g
```

### Show table

* show tables

    `\d`

* show tables with sizes and comments

    `\d+`

* show the specific table layout

    `\d table_name`
    
* show the specific table layout with storage type and comments.

    `\d+ table_name`

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
    
## Docker

```
docker run -d --name postgres -e POSTGRES_PASSWORD=password -p 5432:5432 postgres:11
docker run -d -p 5432:5432 --name docker_process_name -e POSTGRES_USER=user_name -e POSTGRES_PASSWORD=password -e POSTGRES_DB=db_name
```

* `-p 5432:5432`
    * first `5432` shows the listening port. docker forward access to the port to the destination port.
    * last `5432` shows the destination port.

## Reference

* stackoverflow. (2014). _How to display the function, procedure, triggers source code in postgresql?_ Retrieved from https://stackoverflow.com/questions/6898453/how-to-display-the-function-procedure-triggers-source-code-in-postgresql
