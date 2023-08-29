---
title: rspecがらみのメモ
date: 2013-10-20 00:00:00
categories: ruby
tags: rspec ruby
layout: post
---

## private method をテストする方法

```ruby
@obj.send(:private_method, args)
```

と書くとテストできる。
rails のspec書くときに何度もハマった。

## expect を should の代わりに使うには

```ruby
expect(foo).to eq(bar)
expect(foo).not_to eq(bar)
```
