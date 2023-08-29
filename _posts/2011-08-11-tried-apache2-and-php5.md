---
layout: post
title: Apache2 と php5 を動かしてみた。
date: 2011-08-11 00:00:00 +0900
tags: [Apache, php5]
categories: [linux]
---

<p>Apache2 と php5 を VineLinux 上 で動かしてみることにした。</p>

<p>Apache2 を Synaptics を使ってインストール。</p>
<p>/home/UserName/XXX をhttp://localhost/ と結びつけたかったけれど、403エラー多発＆解決無理 ということで、標準で設定されている /var/www/html でWEBSITEを作ってみることにした。（chmod であれこれやっても無理だった。）</p>
<p>Apache2の設定ファイルは /etc/apache2/conf/httpd.conf 。こいつをvimで変更すると、localhost:80 が参照するディレクトリを変えることができる。今回は変えていない。</p>
<blockquote><p># DocumentRoot: The directory out of which you will serve your<br />
# documents. By default, all requests are taken from this directory, but<br />
# symbolic links and aliases may be used to point to other locations.<br />
#<br />
#DocumentRoot "/var/www/html"<br />
DocumentRoot "/home/kenji/WebSites"</p>

<p># This should be changed to whatever you set DocumentRoot to.<br />
#<br />
#&lt;Directory "/var/www/html"&gt;<br />
&lt;Directory "/home/kenji/WebSites"&gt;</p>
</blockquote>
<p>DocumentRoot ってのがlocalhost:80の場所。</p>
<p>httpd.conf を変更した後は、　/etc/init.d/apache2 configtest を実行してから、/etc/init.d/apache2 reload をやると反映されるらしい。</p>
<p>/etc/init.d/apache2 stop で止めてから /etc/init.d/apache2 start をやるもよし。/etc/init.d/apache2 restart をやるもよし。</p>
<p>phpを使う場合は、synaptic で php5-apache2 ってのをインストールすればいい。もし、PHPのモジュールが組み込まれないようであれば、さっきの httpd.conf に、LoadModule php5_module modules/libphp5.so を追加する。</p>

