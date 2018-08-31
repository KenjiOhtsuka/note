---
layout: page
---

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

## sed

### Add line to top of the file

```sh
sed -i -e '1i something' file_path
```

#### for each file

```sh
for file in `find . -type f -name "*.md"`; do;
  sed -i -e "1i something\nsomething" $file
done
```

### Change special character

```sh
F=access/path.php
cp -v $F ${F}_bk
sed -i -e 's/<?php echo file_get_contents(\$_SERVER\['\''DOCUMENT_ROOT'\''\]\.'\''\/file\/path.html'\''); ?>//g' $F
sed -i -e 's/^\(\s*\)<\/tag>/\1    <?php echo file_get_contents\($_SERVER['\''DOCUMENT_ROOT'\''].'\''\/file\/path.html'\''\); ?>\n\1<\/tag>/g' $F
diff $F ${F}_bk
rm -i ${F}_bk
```

* `sed -e` で、 `$`, `(`, `)` はエスケープしなくてよい。
* パターンは `\1`, `\2` で参照できる。


## grep

```sh
find banner -type f -print0 2>&1|xargs -0 grep -dskip "</head>"
find public_html -type f | grep -dskip "<head>" | grep -d head.html
```

## wget

```
wget -O output_file_name url
```

## ftp

Connect with `ftp` first, after that, type `open $server_name`.
Then, user name and password will be asked.


## Alternatives

```sh
sudo alternatives --install /usr/bin/java java /usr/java/jdk... 3
sudo alternatives --install /usr/bin/java java /usr/local/lib/jdk-10.0.2/bin/java 4
```