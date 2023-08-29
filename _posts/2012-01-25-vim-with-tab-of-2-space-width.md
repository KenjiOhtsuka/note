---
layout: post
title: vim タブをスペース２つにする
date: 2012-01-25 00:00:00 +0900
tags: [vim]
categories: [vim]
---

<p><strong>Vim</strong>で、<strong>タブ</strong>を<strong>スペース</strong>にする方法。</p>
<blockquote><p>set tabstop=2<br />
set shiftwidth=2<br />
set expandtab</p></blockquote>
<p>を _vimrc ファイルに書き込む。ついでに、 set number も書いておくと、<strong>行番号</strong>が自動で表示されるので便利。</p>
<p>windows の gVim の場合は、program files\vim の下にある。</p>
