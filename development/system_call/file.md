---
layout: page
title: システムコール - ファイル
---



## lseek

ファイルにランダムアクセスするためのシステムコール。

```c
off_t lseek(int filedes, off_t offset, int whence)
```

* `filedes`
    * ファイルディスクリプた
* `offset`
    * オフセット
    * `whence` によって使われ方が変わる。
* `whence`
    * `SEEK_SET`, `SEEK_CUR`, `SEEK_END` といった、決められた値を取る。
    * `SEEK_SET`: オフセットの指定位置に進む。
    * `SEEK_CUR`: 現時点の位置+オフセットの位置に進む。
    * `SEEK_END`: 対象ファイルの最後+オフセットの位置に進む。

## stat, fstat

ファイルの情報を取得する。 inode 情報 も取得できる。

```c
int fstat(int fildes, struct stat *buf);
int stat(const char *restrict path, struct stat *restrict buf);
```

コマンドラインでも `stat` というコマンドが使える。
EC2 では次のようになった。

```
[kenjiotsuka@sample]~% stat a.out 
  File: ‘a.out’
  Size: 9904            Blocks: 24         IO Block: 4096   regular file
Device: ca50h/51792d    Inode: 526920      Links: 1
Access: (0775/-rwxrwxr-x)  Uid: (  500/kenjiotsuka)   Gid: (  501/kenjiotsuka)
Access: 2021-07-07 09:29:59.116589605 +0900
Modify: 2021-07-07 09:29:55.092364079 +0900
Change: 2021-07-07 09:29:55.096364304 +0900
 Birth: -
```

