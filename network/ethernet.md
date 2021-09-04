---
layout: page
title: Ethernet
---

* A family of wired computer networking technologies
* Commonly used in LAN, MAN and WAN
* IEEE802.3
* Largely replaced Token Ring, FDDI and ARCNET.
* CSMA/CD (Carrier Sense Multiple Access with Collision Detection)
* LAN通信では、 Ethernet と TCP/IP の組み合わせが一般的。
    * Ethernet が主に物理規格を決め、 TCP/IP が通信内容を決めている。

## Frame

| Name | Size | Description | Note |
|:--|--:|:--|:--|
| プリアンブル | 7 byte | | チップが生成 |
| フレーム開始識別 | 1 byte | `10101011` | チップが生成 |
| 宛先イーサネットアドレス | 6 byte | イーサネットMACアドレス | |
| 送信元イーサネットアドレス | 6 byte | イーサネットMACアドレス | |
| データの長さ・タイプ | 2 byte | | |
| データ | 46-1500 byte | | |
| フレームチェックシーケンス | 4 byte | CRC32 | |

## Ethernet Topology

* Bus
* Star
* Ring

