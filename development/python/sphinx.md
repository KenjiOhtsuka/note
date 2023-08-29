---
layout: page
title: Sphinx - Python Library
---

## Template

* よく見るレイアウト
    * [sphinx_rtd_theme](https://github.com/rtfd/sphinx_rtd_theme)


## toctree

* `:numbered:`

## document


* `.. code-block:`
    * コード記述。
    * コードの1行目との間を1行開ける。
    * 言語を指定できる。
    * サンプル
        ```
        .. code-block: js

            console.log(1)
        ```

### リンク

* ページ内リンク
    * add label: `_something`
    * add link: ```:ref:`Name<something>````
* 別ページへのリンク
    * ```:doc:`Name</file/path>````

## Guide

* [Study Sphinx](https://planset-study-sphinx.readthedocs.io/ja/latest/index.html)
