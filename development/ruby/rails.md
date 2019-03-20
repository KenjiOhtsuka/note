---
layout: page
---

# Rails

## Reset user's password

launch rails console.

```
user = User.find(1) # or something to get one user
user.unlock_access!
```
## Generate

### Migration

If you add `owner_id` column to `users` table:

```sh
rails g migration AddOwnerIdToUsers
```
