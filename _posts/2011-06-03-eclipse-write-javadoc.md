---
title: eclipse で Javadoc を自動生成する方法
date: 2011-06-03 00:00:00 +0900
tags: [eclipse, javadoc]
categories: [eclipse]
---

Javadoc を生成するには、まず Javadoc のためのコメントをつける必要がある。次のように。（これは、ショートカットキー Shift + Alt + J でもできる。）

```java
/**　（←ここで Enter を押すと、うまいこと整形してくれる）
 *
 * @param a
 * @return void
 * ～メソッドの説明～
 */
private void ...
```

<p>メニューバーのプロジェクト(project)から javadoc 生成(Generate Javadoc) を選ぶ</p>

<p>すると、ウインドウが開き、どのjavadocを作るのか、どの場所に作るのかを選択できるようになる。あとは画面の指示に従ってやっていけばおｋ。</p>
