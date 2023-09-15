---
layout: page
title: URI
---

## URI

* [RFC3986](https://tools.ietf.org/html/rfc3986)

### URIの構成

* URIはscheme, authority, path, query, fragmentの5つのコンポーネントから構成される
* scheme, authority, pathは必須
* query, fragmentはオプション

```
URI = scheme ":" hier-part [ "?" query ] [ "#" fragment ]
```

### scheme

* schemeはURIの種類を表す
* schemeは大文字小文字を区別しない
* schemeは英数字と`+`, `-`, `.`のみを使用する
* schemeは`:`で終わる
* schemeは`//`で始まる
* schemeは`//`の後にauthorityが続く場合と続かない場合がある
* schemeは`//`の後にauthorityが続かない場合はpathから始まる

```
scheme = ALPHA *( ALPHA / DIGIT / "+" / "-" / "." )
```

### authority

* authorityはユーザー情報、ホスト、ポート番号から構成される
* authorityは`@`で区切られたユーザー情報、ホスト、ポート番号の順に記述される
* authorityは`@`がない場合はホストから始まる
* authorityは`@`がない場合はユーザー情報は省略される
* authorityは`@`がない場合はポート番号は省略される
* authorityは`@`がない場合はホストは省略されない

```
authority = [ userinfo "@" ] host [ ":" port ]
```

#### userinfo

* userinfoはユーザー名とパスワードから構成される
* userinfoは`:`で区切られたユーザー名とパスワードの順に記述される
* userinfoは`:`がない場合はユーザー名のみ
* userinfoは`:`がない場合はパスワードは省略される

```
userinfo = *( unreserved / pct-encoded / sub-delims / ":" )
```

#### host

* hostはホスト名またはIPアドレスから構成される
* hostはホスト名またはIPアドレスのいずれかのみ
* hostは`[]`で囲まれたIPアドレスの場合は`[]`を含む

```
host = IP-literal / IPv4address / reg-name
```

#### port

* portはポート番号から構成される
* portは10進数のみ
* portは0から65535までの範囲のみ

```
port = *DIGIT
```

### path

* pathは階層構造のパスから構成される
* pathは`/`で区切られた階層構造のパスの順に記述される
* pathは`/`がない場合は階層構造のパスは省略される

### query

* queryはクエリ文字列から構成される
* queryは`?`で始まる
* queryは`?`の後にクエリ文字列が続く場合と続かない場合がある
* queryは`?`の後にクエリ文字列が続かない場合はfragmentから始まる

```
query = *( pchar / "/" / "?" )
```

### fragment

* fragmentはフラグメント識別子から構成される
* fragmentは`#`で始まる
* fragmentは`#`の後にフラグメント識別子が続く場合と続かない場合がある

```
fragment = *( pchar / "/" / "?" )
```

## URL

* [RFC3986](https://tools.ietf.org/html/rfc3986)
* [RFC1738](https://tools.ietf.org/html/rfc1738)
* [RFC1808](https://tools.ietf.org/html/rfc1808)
* [RFC2396](https://tools.ietf.org/html/rfc2396)
* [RFC2732](https://tools.ietf.org/html/rfc2732)
* [RFC3987](https://tools.ietf.org/html/rfc3987)

### URLの構成

* URLはscheme, authority, path, query, fragmentの5つのコンポーネントから構成される
* scheme, authority, pathは必須
* query, fragmentはオプション

## URN

* [RFC2141](https://tools.ietf.org/html/rfc2141)

* [RFC8141](https://tools.ietf.org/html/rfc8141)
* [RFC3406](https://tools.ietf.org/html/rfc3406)

### URNの構成

* URNはURNスキーム、URN名から構成される
* URNスキームはURNの種類を表す
* URNスキームは大文字小文字を区別しない
* URNスキームは英数字と`+`, `-`, `.`のみを使用する
* URNスキームは`:`で終わる
* URNスキームは`:`の後にURN名が続く

```
URN = urn ":" NID ":" NSS
```

### NID

* NIDはURNの種類を表す
* NIDは大文字小文字を区別しない
* NIDは英数字と`+`, `-`, `.`のみを使用する
* NIDは`:`で終わる
* NIDは`:`の後にURN名が続く

```
NID = 1*ALPHA
```

### NSS

* NSSはURN名から構成される
* NSSは大文字小文字を区別する
* NSSは英数字と`+`, `-`, `.`, `:`, `_`, `~`のみを使用する
* NSSは`:`で終わる
* NSSは`:`の後にURN名が続く

```
NSS = 1*( unreserved / pct-encoded / sub-delims / ":" )
```




