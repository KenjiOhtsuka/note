---
layout: post
title: Create a subset of font file in CLI
categories: font woff woff2 nodejs python
date: 2019-10-07T10:00:00+9:00
---

I introduce how to create font file subset in command line.

## Prerequisite

This time, I used NodeJS and Python.
(NodeJS seems to use Python libraries so I think we can do the same thing only with Python.)

* NodeJS (v12.6.0)
* Python (3.6.8)

## Check the character code for the characters which are input into the subset

Get the character codes in hexadecimal number format.

### Check in Python (3.6)

```python
hex(ord('0'))  # => '0x30'
hex(ord('9'))  # => '0x39'
```

### Check in Ruby (2.5.1)

```ruby
'0'.ord.to_s(16)  # => "30"
'9'.ord.to_s(16)  # => "39"
```

## Install tools

### Python tools

```sh
$ pip install fonttools brotli
```

### NodeJS tool

```sh
$ npm install -g glyphhanger
```

## Create subset

```sh
$ glyphhanger --whitelist="U+30-39" --subset something.ttf --formats=woff2
```

`--whitelist` indicates the characters to be in the subset, which are designated in the format `U+XX`.
Here, `woff2` format file will be created.

As a result, `something-subset.woff2` was created.

`--formats` can receive multiple formats, as `--formats=woff,woff2`.

## Related page

* [glyphhanger](https://github.com/filamentgroup/glyphhanger)
