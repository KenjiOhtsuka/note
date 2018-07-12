
### Create Account

```sql
CREATE USER user_name WITH LOGIN CREATEDB PASSWORD 'XXXXXXXXXX';
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

### 同じデータベースでユーザー名だけを切り替える

```
\connect - user_name
```

### 別のデータベースでユーザー名だけを切り替えるには

```
\connect database_name user_name
```
