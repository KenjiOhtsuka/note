---
layout: page
title: Application layer remote login protocol
---

## Telnet

### Network Virtual Terminal

| 制御文字 | 10進数 | 説明 |
|:--|:--|:--|
| NUL | 0 | なにもしない |
| BEL | 7 | Bell (可聴音または可視信号) |
| BS | 8 | 1文字左に移動 |
| HT | 9 | Horizontal tab |
| LF | 10 | Line feed |
| VT | 11 | Vertical tab |
| FF | 12 | Page feed (ページ送り) |
| CR | 13 | 復帰 (現在の行の左マージン位置に移動) |
| その他 | - | なにもしない |

### TELNET Negotiation

クライアントホストとサーバホストの間で話し合って付加的な制御記号を決めること、またその動作。

* TELNET には、 NVT 制御記号 を補うための付加的な制御記号がある。。
* Negotiation が成立しなければ、NVT制御文字のみを使用して動作を続ける。
