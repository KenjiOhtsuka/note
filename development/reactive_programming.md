---
layout: page
---

# リアクティブプログラミング (Reactive Programming)

* non-blocking applications (ノンブロッキング)
* asynchronous (非同期)
* event-driven (イベントドリブン)
* require a small number of threads to scale vertically (i.e. within the JVM) rather than horizontally (i.e. through clustering). (垂直スケールの方が水平スケールより必要となるスレッド数が少ない)

## Scale

* Horizontal Scaling 水平スケール
    * scale by adding more machines into your pool of resources
    * スケールアウト
* Vertical Scaling 垂直スケール
    * scale by adding more power (CPU, RAM) to an existing machine.
    * スケールアップ
