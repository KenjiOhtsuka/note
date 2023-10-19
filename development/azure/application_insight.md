---
layout: page
title: Application Insight
---


## Order by timestamp

```kql
requests
| where timestamp between (datetime("2023-10-17 16:00:00") .. datetime("2023-10-17 19:00:00"))
| where name endswith "something"
| order by timestamp desc
| take 1000
```

### Count by some columns

```kql
requests
| where timestamp between (datetime("2023-10-17 16:00:00") .. datetime("2023-10-17 19:00:00"))
| where name startswith "something"
| summarize count() by url, resultCode
```

### Count by hour

```kql
requests
| where timestamp between (datetime("2023-10-17 00:00:00") .. datetime("2023-10-18 00:00:00"))
| where name has "something"
| project hour=hourofday(timestamp)
| summarize count() by hour
| order by hour asc
```
