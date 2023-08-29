---
layout: post
title: "Ubuntu: vimで日本語固定入力"
date: 2013-09-18 00:00:00 +0900
tags: [Ubuntu, vim, 日本語入力]
categories: [Ubuntu]
---

<p>Ubuntuで日本語入力にIBUSを使っています。標準の状態では日本語入力が面倒なので日本語固定入力というのをできるようにしました。windows のgvimでは、元から日本語固定入力になっています。</p>

日本語固定入力とは、挿入モードになったら自動的に日本語入力モードに切り替わることです。

<p>github でも公開されています。<q>https://github.com/fuenor/im_control.vim</q></p>
<p>説明サイト: https://sites.google.com/site/fudist/Home/vim-nihongo-ban/vim-japanese/ime-control/ibus</p>
<p>~/.vim/plugin ディレクトリに im_control.vim を入れて、 ~/.vimrc に以下の記述を加えればOKでした。</p>
<blockquote>" 「日本語入力固定モード」切替キー<br />
inoremap &lt;silent&gt; &lt;C-j&gt; &lt;C-r&gt;=IMState('FixMode')&lt;CR&gt;<br />
" PythonによるIBus制御指定<br />
let IM_CtrlIBusPython = 1<br />
<br />
" &lt;ESC&gt;押下後のIM切替開始までの反応が遅い場合はttimeoutlenを短く設定してみてください。<br />
set timeout timeoutlen=3000 ttimeoutlen=100</blockquote>
<p>これで、ctrl+j で日本語入力が切り替えると、日本語固定入力になります。<span style="text-decoration: underline">ctrl+spaceで切り替えた場合は固定入力になりません。</span></p>
