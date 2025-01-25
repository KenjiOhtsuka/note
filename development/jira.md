---
title: JIRA
---

## Automation rule

### Copy parent priority

```json
{
    "fields": {
        "priority": {
            "name": "{{parent.fields.priority.name}}"
        }
    }
}
```
