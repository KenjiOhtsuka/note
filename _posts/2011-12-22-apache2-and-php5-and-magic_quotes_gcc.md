---
title: Apache2 + PHP5 で magic_quotes_gpc = off に設定
date: 2011-12-22 00:00:00 +0900
tags: [Apache, php5, magic_quotes_gpc]
categories: [linux]
---

<p>POST を使って投稿したデータが・・・ mysql から取り出すと ・・・バックスラッシュが増えてる！！！ なんてことになったので、調べてみた。</p>

<p>Twitter でつぶやけど、誰も教えてくれないので、ひたすら検索しまくりました。そしたら、<strong>magic_quotes_gpc</strong> という設定値が ON になっているらしいとのこと。</p>
<p><strong>magic_quotes_gpc</strong> の機能は・・・ バックスラッシュがあったらもひとつバックスラッシュをつけてエスケープっぽいことをする、ということです。Get, Post, Cなんとか のときに、送受信データにバックスラッシュをつけて処理するんだそうです。するとですね、予期しないところにバックスラッシュが勝手に入るわけですよ。もう悲惨です。</p>
<h3>解決策</h3>

<p>まずは <strong>magic_quotes_gpc</strong> が ON になっていることを確認します。php ファイルの中で <ins>echo phpinfo()</ins> なんてやってやると出てきます。ほかにも方法はあります。</p>
<p>次に設定を変更します。ファイル内でオン・オフを判別してif文で処理を分岐させるという手もありますが、現在では非推奨機能となっており、php6で消滅する予定なので、if文なんて書くだけ無駄です。設定ファイルですが、debian lenny, apache2, php5 を使っている私の環境では、/etc/php5/apache2/php.ini でした。</p>

<p>それでは、 <ins>cat -n /etc/php5/apache2/php.ini | grep magic</ins> と書いてみましょう。 457行目に"<strong>magic_quotes_gpc=ON"</strong>とあるのがわかります。  <ins>vim file_name</ins> でファイルを開き、<ins>:457</ins> と入力して Enter を押します（これで457行目に飛びます）。編集して保存。</p>
<p>最後に　`apache2ctl restart` を実行して検証です。</p>
