---
layout: page
title: MS SQL (SQL Database, SQL Server), T-SQL Convention
---

## sqlcmd

docker image: `mcr.microsoft.com/mssql-tools:latest`

SQL command can be executed with `/opt/mssql-tools/bin/sqlcmd`

### sqlcmd arguments

- help: `-?`
- connect db: `sqlcmd -S localhost -U user_name -P password -d db_name`

## Get Record Count

```sql
DECLARE @count INTEGER = 0;
SELECT @count = COUNT(1)
  FROM the_table;
```

## Conditional by Record Existence

### with variable

```sql
DECLARE @count INTEGER = 0;
SELECT @count = COUNT(1)
  FROM the_table;

IF @count > 0
  BEGIN
    -- some process
  END
```

### without variable

```sql
IF EXISTS(
   SELECT 1
)
  BEGIN
    -- some process
  END
```

## Create temporary table

Add `#` at the head of the table name.

```sql
CREATE TABLE #target_client (
    sample_1 VARCHAR(255),
    sample_2 VARCHAR(255)
);
```

## Turn On/Off Triggers

### Change a specific trigger

```sql
-- stop trigger
ALTER TABLE table_name DISABLE TRIGGER trigger_name;
-- alternative
DISABLE TRIGGER trigger_name ON trigger_table;
```

```sql
-- start trigger
ALTER TABLE table_name ENABLE TRIGGER trigger_name;
-- alternative
ENABLE TRIGGER trigger_name ON table_name;
```

To change all triggers on a table at once, change `trigger_name` to `ALL` syntax.
