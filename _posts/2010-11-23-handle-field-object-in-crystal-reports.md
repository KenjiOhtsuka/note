---
title: Crystal Report で フィールド・オブジェクトを操作する方法
date: 2010-11-23 00:00:00 +0900
tags: [Crystal Report, フィールドオブジェクト]
categories: [Crystal Report]
---


<p><strong>Crystal Report</strong>、プログラムの変更依頼があった。</p>
<p>レポートデザイナでのオブジェクトを操作するにはどうすればいいか。わかってしまえば単純なものだが、わかるまでが大変。VBでやってみた。</p>

```vb
Dim UserReport0 as new UserReport

DirectCast(UserReport0.ReportDefinition.ReportObjects("Box1"), CrystalDecisions.CrystalReports.Engine.BoxObject).FillColor = Color.Silver
```
<p>キャスト(型変換)してプロパティを使えるようにするという込み入った作業が必要。</p>
<p>CType よりも DirectCast のほうが負荷が少ないらしい。C# のは下記ページにある。</p>
<p>参考： http://www.hirano.cc/crystalreports/misc.html</p><div style="text-align:center;"><iframe src="http://rcm-jp.amazon.co.jp/e/cm?t=mezurashinews-22&o=9&p=12&l=st1&mode=books-jp&search=crystal%20reports&fc1=000000&lt1=_blank&lc1=3366FF&bg1=FFFFFF&f=ifr" marginwidth="0" marginheight="0" width="300" height="250" border="0" frameborder="0" style="border:none;" scrolling="no"></iframe></div>
