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

### Revert

* Revert merge commit
    ```sh
    git revert -m 1 {revision}
    ```

## Submodule

### Update

```bash
git submodule foreach git pull origin master
```

## Branch

### Rename

#### Rename local branch

* rename any branch

    ```
    git branch -m old_name new_name
    ```
    
* rename current branch

    ```
    git branch -m new_name
    ```

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

## Resolve Conflict

`checkout --ours` と
`checkout --theirs` を使うことで、 片方の変更を適用できる。

### Excample

```sh
git checkout --ours file1.txt
git checkout --theirs file2.txt
git add file1.txt file2.txt
git commit
```

## Add file from other branch

```sh
git add branch_name file_path
```

## Show file in other branch

```sh
git show branch_name:file_path
```
## Log

* `-p`
    * 差分も一緒に表示する。
    * ファイルを限定する場合は `-p` の後にファイルへのパスを記述する。
* `-p --name-only`
    * 差分のファイルリストを一緒に表示する

## .gitignore

* If you ignore the file, `!` can't affect to the inner files.
    ```
    dir/
    !dir/file
    ```
* To include specific files in the directory, don't ignore the directory, but files.
    ```
    dir/*
    !dir/file
    ```

## Other

* Entirely different branches can't be merged
    * when trying merge, the following message will be got.
        * `fatal: refusing to merge unrelated histories`
    * in GitHub, difference can't be seen.
        * Example: [Comparison Page](https://github.com/KenjiOhtsuka/git_test/compare/test?expand=1)
* 直前のコミットの日付を変更する。
    * `git --amend --date="2015-02-01 01:00:11"`
    * GitHub の表示例: [Date Changed Commit](https://github.com/KenjiOhtsuka/git_test/commits/master)
        * "Commits on Sep 4, 2018" のコミット日時がおかしくなっている。 
