---
date: 2013-10-21 00:00:00
title: jquery and coffeescript - coffeescript で jquery の each を使う
tags: jquery coffeescript
categories: javascript
layout: post
---

`each` の内部で `$(this)` を使うことができない。
coffeescript では `var _this = this` として最初に代入しているため、
`each` の処理ごとに `this` が変わっていかない。
そこで、代わりに `$(element)` を使う。

```js
$(something).each (index, element) =>
  $(element).method ...
```
