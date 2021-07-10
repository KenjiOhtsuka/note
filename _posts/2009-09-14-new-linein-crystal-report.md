---
layout: post
title: CrystalReport グループを作ると空白ページ
category: crystalreport
tag: crystalreport
---
 
 
クリスタルレポートでグループ化をして、グループフッタ表示後に改ページをするようにしておくと、最後になんにもない空白のページができてしまいます。


これを回避するには、グループフッタの「出力後に改ページ」の条件付書式に、次のように書きます。

```
WhilePrintingRecords;
OnLastRecord <> True;
```


