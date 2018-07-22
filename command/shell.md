# Shell Command

## Move all found files by `find` 

```zsh
find directory/path -type f -wholename *.png -exec mv -v {} target_directory \;
```

## unzip

### list up zipped files

```
unzip -l file.zip
```

## curl

```sh
curl \
  -H "Content-Type: application/json" \
  -H 'Token: token="Ep4lqUPBLM0zY/1/uyQFSG/z1T0FJ4eALYn1f2inp98UnZkx3RqqKg=="' \
  -X POST \
  -d '{
  "a" : {
    "b": 1,
    "c": 2
  }
}' http://localhost:3000/api/damage/reports
```

* `-H`: Header
* `-X`: Method
* `-d`: data

## less

* -N: Line number
