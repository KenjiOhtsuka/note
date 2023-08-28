---
title: "rails capybara: visit の後のステータスコードをチェックする方法"
date: 2013-09-26 00:00:00 +0900
tags: [capybara, visit, status]
categories: [rails]
---

<div style="text-align:center;">
<div><a href="https://hb.afl.rakuten.co.jp/ichiba/144e0ebd.a7a916b6.144e0ebe.acfa319f/?pc=https%3A%2F%2Fitem.rakuten.co.jp%2Frakutenkobo-ebooks%2Ff6fbb68bdcee34389bc3b0fd51ccbd03%2F&link_type=pict&ut=eyJwYWdlIjoiaXRlbSIsInR5cGUiOiJwaWN0Iiwic2l6ZSI6IjQwMHg0MDAiLCJuYW0iOjEsIm5hbXAiOiJyaWdodCIsImNvbSI6MSwiY29tcCI6ImRvd24iLCJwcmljZSI6MCwiYm9yIjoxLCJjb2wiOjEsImJidG4iOjEsInByb2QiOjAsImFtcCI6ZmFsc2V9" target="_blank" rel="nofollow sponsored noopener" style="word-wrap:break-word;"><img src="https://hbb.afl.rakuten.co.jp/hgb/144e0ebd.a7a916b6.144e0ebe.acfa319f/?me_id=1278256&item_id=11682420&pc=https%3A%2F%2Fthumbnail.image.rakuten.co.jp%2F%400_mall%2Frakutenkobo-ebooks%2Fcabinet%2F2110%2F2000000252110.jpg%3F_ex%3D400x400&s=400x400&t=pict" border="0" style="margin:2px" alt="" title=""></a></div><p><a href="https://hb.afl.rakuten.co.jp/ichiba/144e0ebd.a7a916b6.144e0ebe.acfa319f/?pc=https%3A%2F%2Fitem.rakuten.co.jp%2Frakutenkobo-ebooks%2Ff6fbb68bdcee34389bc3b0fd51ccbd03%2F&link_type=text&ut=eyJwYWdlIjoiaXRlbSIsInR5cGUiOiJ0ZXh0Iiwic2l6ZSI6IjQwMHg0MDAiLCJuYW0iOjEsIm5hbXAiOiJyaWdodCIsImNvbSI6MSwiY29tcCI6ImRvd24iLCJwcmljZSI6MCwiYm9yIjoxLCJjb2wiOjEsImJidG4iOjEsInByb2QiOjAsImFtcCI6ZmFsc2V9" target="_blank" rel="nofollow sponsored noopener" style="word-wrap:break-word;">Rails3レシピブック 190の技【電子書籍】[ 高橋 征義 ]</a></p>
</div>

<strong>capybara</strong> で <strong>visit</strong> した後のステータスコードのチェックをするにはどうすればよいか。上の本によると、`response.status.should be(200)` と書けばよさそうな感じで説明してある。

しかし、そんなことやっても

```
Failure/Error: response.status.should be(200)<br />
NoMethodError:<br />
  undefined method `status' for nil:NilClass
```

と言われて終わるのである。たとえばこれを `get 'path'` のように書くと、response は `nil` ではなくなる。そして、

```
Failure/Error: response.status.should be(200)<br />
       expected #<Fixnum:401> => 200<br />
            got #<Fixnum:605> => 302
```

と出力される。302は確かにエラーではない・・・が、これだとリクエストをしているだけで、`find`, `fill_in` などでページ内のオブジェクトを操作することができない。

<p>そこで `visit` とやって、`page.status_code.should be(200)` とやってみる。成功したのでこれが正解っぽい。<a href="/note/rails/2013/09/25/capybara-and-launchy.html" target="_blank">save_and_open_page</a> でページも確かめている。</p>

<div style="text-align:center;">
<div><a href="https://hb.afl.rakuten.co.jp/ichiba/144e0ebd.a7a916b6.144e0ebe.acfa319f/?pc=https%3A%2F%2Fitem.rakuten.co.jp%2Frakutenkobo-ebooks%2Ff6fbb68bdcee34389bc3b0fd51ccbd03%2F&link_type=pict&ut=eyJwYWdlIjoiaXRlbSIsInR5cGUiOiJwaWN0Iiwic2l6ZSI6IjQwMHg0MDAiLCJuYW0iOjEsIm5hbXAiOiJyaWdodCIsImNvbSI6MSwiY29tcCI6ImRvd24iLCJwcmljZSI6MCwiYm9yIjoxLCJjb2wiOjEsImJidG4iOjEsInByb2QiOjAsImFtcCI6ZmFsc2V9" target="_blank" rel="nofollow sponsored noopener" style="word-wrap:break-word;"><img src="https://hbb.afl.rakuten.co.jp/hgb/144e0ebd.a7a916b6.144e0ebe.acfa319f/?me_id=1278256&item_id=11682420&pc=https%3A%2F%2Fthumbnail.image.rakuten.co.jp%2F%400_mall%2Frakutenkobo-ebooks%2Fcabinet%2F2110%2F2000000252110.jpg%3F_ex%3D400x400&s=400x400&t=pict" border="0" style="margin:2px" alt="" title=""></a></div><p><a href="https://hb.afl.rakuten.co.jp/ichiba/144e0ebd.a7a916b6.144e0ebe.acfa319f/?pc=https%3A%2F%2Fitem.rakuten.co.jp%2Frakutenkobo-ebooks%2Ff6fbb68bdcee34389bc3b0fd51ccbd03%2F&link_type=text&ut=eyJwYWdlIjoiaXRlbSIsInR5cGUiOiJ0ZXh0Iiwic2l6ZSI6IjQwMHg0MDAiLCJuYW0iOjEsIm5hbXAiOiJyaWdodCIsImNvbSI6MSwiY29tcCI6ImRvd24iLCJwcmljZSI6MCwiYm9yIjoxLCJjb2wiOjEsImJidG4iOjEsInByb2QiOjAsImFtcCI6ZmFsc2V9" target="_blank" rel="nofollow sponsored noopener" style="word-wrap:break-word;">Rails3レシピブック 190の技【電子書籍】[ 高橋 征義 ]</a></p>
</div>
