---
layout: page
---

# file

macOS で使えるコマンド。
ファイルについての情報を出力する。

## テキストファイルの文字コードを調べる。

```sh
$ file -b file_name
```

または

```sh
$ file -mine file_name
```

| 結果の文字列 | encoding |
|:--|:--|
| UTF-8 text | UTF-8 |
| ASCII text | JIS |
| ISO-8859 text | EUC |
| Non-ISO extended-ASCII text	| Shift-JIS |
