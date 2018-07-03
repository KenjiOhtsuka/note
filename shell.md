# Shell Command

## Move all found files by `find` 

```zsh
find directory/path -type f -wholename *.png -exec mv -v {} target_directory \;
```
