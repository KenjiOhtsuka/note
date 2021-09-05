---
layout: page
title: Ethernet
---

* XEROX, DEC(Hewlett-Packerd), Intel が1980年に共同開発したバス型LANの標準規格。
* A family of wired computer networking technologies
* Commonly used in LAN, MAN and WAN
* Standardized in IEEE802.3
* Largely replaced Token Ring, FDDI and ARCNET.
* CSMA/CD (Carrier Sense Multiple Access with Collision Detection)
* LAN通信では、 Ethernet と TCP/IP の組み合わせが一般的。
    * Ethernet が主に物理規格を決め、 TCP/IP が通信内容を決めている。
* イーサネットアドレスはハードウェアによって割り当てられるため、アドレスを知っていても、そのアドレスがネットワーク上のどこにあるかを直接示せない。
    * スイッチドイーサネット: スイッチはネットワーク上の個々のイーサネットアドレスごとに転送テーブルレコードを管理する。
        * 最大10,000〜100,000ノードのネットワークで非常にうまく機能します。
        * それ以上のサイズだと、転送テーブルの管理が大変になります。

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

## Bandwidth

帯域幅は、 当初は 10 Mbps でスタートした。
その後改良が繰り返されて、 10 Gbps の規格も生まれている。

| Name | IEEE | Speed | Media Type | Max Distance |
|:--|:--|:--|:--|:--|
| Ethernet | 802.3 | 10 Mbps | 10Base-T | 100 m |
| Fast Ethernet / 100Base-T | 802.3u | 100 Mbps | 100Base-TX <br>100Base-FX	| 100 m <br>2000 m |
| Gigabit Ethernet / GigE | 802.3z | 1000 Mbps | 1000Base-T<br>1000Base-SX<br>1000Base-LX | 100 m<br>275/550 m<br>550/5000 m |
| 10 Gigabit Ethernet | 802.3ae | 10 Gbps | 10GBase-SR<br>10GBase-LX4<br>10GBase-LR/ER<br>10GBase-SW/LW/EW | 300 m<br>300m MMF/ 10km SMF<br>10km/40km<br>300m/10km/40km |

Reference

* https://www.lantronix.com/resources/networking-tutorials/ethernet-tutorial-networking-basics/

## Format 企画

| Name | Cable | Bandwidth | Max Length |
|:--|:--|--:|--:|
| 10BASE-5 | thick coax | 10 Mbps | 500 m |
| 10BASE-2 | thin coax | 10 Mbps | 185 m |
| 10BASE-T | UTP | 10 Mbps | 100 m |
| 100BASE-TX | UTP | 100 MBps | |
