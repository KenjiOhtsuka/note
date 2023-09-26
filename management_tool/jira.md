---
layout: page
title: Jira Conventions
---

## list watching issues

Use `watcher` and `currentUser()` to filter watching issues.

```jql
project = "XXXX" and watcher = currentUser() ORDER BY created DESC
```

## list done issues

use `statusCategory`.

```jql
watcher = currentUser() and statusCategory != Done ORDER BY created DESC
```

`statusCategory` could have 3 kinds of values, `Done`, `In Progress` and `To Do`.
