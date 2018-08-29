---
layout: page
---

# Git

## Alias

```sh
git config --global alias.st status
```

## Commit

### Beck to previous commit (Remain the change)

```sh
git reset --soft HEAD~
```


### Empty Commit


```sh
git commit --allow-empty
```

## Submodule

### Update

```bash
git submodule foreach git pull origin master
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

