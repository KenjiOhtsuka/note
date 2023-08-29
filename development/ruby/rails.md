---
layout: page
title: Rails
---

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

## Migration

```sh
bundle exec rake db:migrate:status
```

## Tips

### Add column and make it not-null

When adding not-null column, there might be some records and we have to set default value.
So, after adding column with non-null constraint and default value, change default value with `change_column_default`.

```ruby
add_column :table, :column, :integer, :null => false, :default => 1
change_column_default :table, :column, nil
```
