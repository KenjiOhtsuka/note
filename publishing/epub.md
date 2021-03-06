---
layout: page
---

# EPUB

* HTMLや画像をZIPにしたもの。
* [CANVA](https://www.canva.com/)というサービスを使って表紙をつくると綺麗にできる。

## Structure

* 基本構成
    ```
    item
    |- xhtml
    |  `- chapter_1.html
    |- style
    |  `- xxx.css
    `- image
       `- xxx.png
    ```


## Editor

* Google Doc
    * Epub にエクスポートできるが、 画像があると配置がおかしくなることがある。
* Microsoft Office Word
    * KDP ならこの形式でアップロードできる

## Grammar

* 改ページ
    ```xhtml
    <br style="page-break-after:always" />
    ```

## Reference

* http://k-airyuu.hatenablog.com/entry/2014/03/02/141514
* http://ebpaj.jp/counsel/guide
* http://www.idpf.org/epub/301/spec/epub-publications-20140626.html
