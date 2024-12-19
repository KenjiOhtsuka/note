---
title: shell
---


## 値の比較

### 文字列

#### 空文字列

文字列としてゼロであることを確認する場合。

```sh
VAL="0"

if [ "$VAL" = "0" ]; then
  echo "VAL は '0' です"
else
  echo "VAL は '0' ではありません"
fi
```

`sh` シェルで文字列の大小比較を行う場合、文字列の比較は辞書順（lexicographical order）に基づいて行われる。

#### 大小

```sh
str1="apple"
str2="banana"

if [ "$str1" \< "$str2" ]; then
  echo "$str1 は $str2 よりも小さいです"
elif [ "$str1" \> "$str2" ]; then
  echo "$str1 は $str2 よりも大きいです"
else
  echo "$str1 と $str2 は等しいです"
fi
```

##### 注意点

- `sh` シェルでは、`<` および `>` 演算子は文字列の比較に使用できるが、エスケープする必要がある (`\<` および `\>`)。 `<` と `>` がシェルのリダイレクト演算子として使われるため。
- 比較結果は辞書順で行われ、文字列の各文字のASCII値に基づいて比較されます。

#### 複数の条件を組み合わせた例

```sh
str1="apple"
str2="banana"
str3="apple"

if [ "$str1" \< "$str2" ] && [ "$str1" = "$str3" ]; then
  echo "$str1 は $str2 よりも小さく、また $str3 と等しいです"
fi
```

### 数値

#### ゼロとの比較

数値としてゼロであることを確認する場合。

```sh
VAL=0

if [ "$VAL" -eq 0 ]; then
  echo "VAL は数値のゼロです"
else
  echo "VAL はゼロではありません"
fi
```
