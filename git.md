---
layout: page
---

# Git

## Commit

### Beck to previous commit (Remain the change)

```sh
git reset --soft HEAD~
```

## Branch

### Delete

#### Delete merged local branch

```
git branch -d branch_name
```

#### Delete local branch, even if it's not merged

```
git branch -D  branch_name
```

#### Delete remote branch

```
git push --delete origin branch_name
git push origin :branch_name
```

### List

#### Remote

```
git branch -r
git branch --remote
```

#### Remote and Local

```
git branch -a
git branch --all
```

