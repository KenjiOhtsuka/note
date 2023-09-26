---
layout: page
title: Jira Conventions
---

## list watching issues

Use `watcher` and `currentUser()` to filter watching issues.

```jql
project = "XXXX" and watcher = currentUser() ORDER BY created DESC
```
