---
layout: page
title: MS SQL (SQL Database, SQL Server), T-SQL Convention
---

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

