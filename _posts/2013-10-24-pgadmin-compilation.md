---
layout: post
title: pgadmin3 のコンパイル
categories: postgresql
tags: pgadmin ubuntu
date: 2013-10-24 00:00:00
---

```
fatal error: parser/kwlist.h: No such file or directory compilation terminated
```

ubuntu 上でコンパイルすると kwlist.h がないと怒られることがある。これは次のようにして解決する 。

<a href="http://msquaredwebsvc.blogspot.com/2012/02/fatal-error-parserkwlisth-no-such-file.html" target="_blank" rel="noreferrer noopener">達人のページ</a>に`kwlist.h`のコードがあるので、それを pgadmin3/include/parser/ の中に入れる。
