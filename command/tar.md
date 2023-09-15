---
layout: page
title: tar command
---

* gz で圧縮

    ```sh
    tar czfv something.tar.gz
    ```

* gz を展開

    ```sh
    tar xzfv something.tar.gz file1 file2 ...
    ```
    
* bz2 で圧縮

    ```sh
    tar cjfv something.tar.bz2 file1 file2 ...
    ```

* bz2 を展開

    ```sh
    tar xjfv something.tar.bz2
    ```

* アーカイブの中身を確認

    ```sh
    tar tvf something.tar.bz2
    tar tvf something.tar.gz
    ```
