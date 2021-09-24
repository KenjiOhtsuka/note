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
| フレームチェックシーケンス | 4 byte | CRC32 | 宛先イーサネットアドレス, 送信元イーサネットアドレス, データの長さ・タイプ, データ から計算される |

* プリアンブルとフレーム開始位置は、物理層のへっダ。
* イーサネットのヘッダとトレーラは合わせて 18 バイト (= 6 + 6 + 2 + 4)

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

## encoding

| Name | Encoding |
|:--|:--|
| 10BASE-T | マンチェスタ符号 |
| 100BASE-TX | MLT-3 + NRZI + 4B5B |
| 1000BASE-T | 8B/1Q4 + 4D-PAM5 |

## Collision

CSMA/CD

1. 送信の前に、データ通信が止まるまで待つ
2. データ送信のときに、 collision が起きるのを監視する。 もし collision が起きたら送信を止める。
3. collision が発生した場合, 待機して再送する。

待機して送信する際のアルゴリズムは exponential backoff algorithm と呼ばれます。

### Exponential backoff algorithm 

1. 送信する前に聞く（「キャリア検出」）
1. 回線がビジーの場合は、送信者が停止するのを待ってから、さらに9.6マイクロ秒（96ビット）待ちます。この結果の1つは、パケット間に常に96ビットのギャップがあるため、パケットが一緒に実行されないことです。
1. 衝突を同時に監視しながら送信する
1. 衝突が発生した場合は、ジャム信号を送信し、次のようにバックオフ時間を選択します。
    1. N回目の送信についてに
        * 1 <= N <= 10（N = 0は最初の試行を表します）、 0 <= k < 2Nでランダムにkを選択します。 kスロット時間（kx51.2µsec）待ちます。
        * 11 <= N <= 15の場合、0 <= k < 1024（= 2^10）でランダムにkを選択します。
    1. 次に、回線がアイドル状態であるかどうかを確認し、必要に応じて他の誰かが終了するのを待ってから、手順3を再試行します。
1. N = 16（16回の送信試行）に達した場合は、あきらめます。

## ネットワーク標準

IEEE 802 がネットワークの標準。

802.3 イーサネット
802.11 Wi-Fi
802.16 WiMAX

継続的な流れ

799 変圧器PCBの取り扱いと廃棄
800 DC航空機回転機
803 発電所などでの一意の識別のための推奨プラクティス。