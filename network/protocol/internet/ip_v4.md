---
layout: page
title: Internet Protocol version 4 (IPv4)
---

## Address Class

<table>
  <thead>
    <tr>
      <th>Class</th>
      <th>1</th>
      <th>2</th>
      <th>3</th>
      <th>4</th>
      <th>5</th>
      <th>6-8</th>
      <th>9-16</th>
      <th>17-24</th>
      <th>25-32</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>A</th>
      <td>0</td>
      <td colspan="5">Network ID</td>
      <td colspan="3">Host ID</td>
    </tr>
    <tr>
      <th>B</th>
      <td>1</td>
      <td>0</td>
      <td colspan="5">Network ID</td>
      <td colspan="2">Host ID</td>
    </tr>
    <tr>
      <th>C</th>
      <td>1</td>
      <td>1</td>
      <td>0</td>
      <td colspan="5">Network Id</td>
      <td>Host ID</td>
    </tr>
    <tr>
      <th>D</th>
      <td>1</td>
      <td>1</td>
      <td>1</td>
      <td>0</td>
      <td colspan="5">Multicast Address</td>
    </tr>
    <tr>
      <th>E</th>
      <td>1</td>
      <td>1</td>
      <td>1</td>
      <td>1</td>
      <td>0</td>
      <td colspan="4">Reserved</td>
    </tr>
  </tbody>
</table>

Class E is reserved for <abbr title="Internet Activities Board">IAB<abbr>, so we can not use.
  
### Network ID

ID that represents local network.

### Host ID

ID that represents one host.

## Number of addresses

| Class | Network | Host |
|:-:|--:|--:|
| A | 126 |16,777,214 |
| B | 16,382 | 65,534 |
| C | 2,097,150 | 254 |

## Address Meaning

| Network ID | Host ID | |
|:-:|:-:|:--|
| 0 | 0 | Used when emitting host doesn't know own address for bootstrap, etc. Special use. |
| 0 | Host Number | Network |
| Network Number | 1 for all | Broadcast for the network |
| 127 | Whatever | For loopback test |

## Multihomed host

* ルータではないホストは、複数のループバックではないネットワークインターフェースを持つことができる。
    * 例
        *　有線LANインターフェースと無線LANインターフェース
    * 必ずしも物理的に異なるインターフェースでなくてもよい。
        * ひとつのインターフェースに複数のIPを関連づけることもできる。
            * ひとつのMACアドレスを共有することになる。
    * サーバとして動く場合や異なるドメイン名に対応する場合に用いられる。

<!--
such arriving packets should be discarded unless the host is promoted to functioning as a router.
In practice, however, the strict interpretation often causes problems; a typical user understanding is that the IP address AIP should work to reach the host even if the physical connection is to interface B.
A related issue is whether the host receiving such a packet addressed to AIP on interface B is allowed to send its reply with source address AIP, even though the reply must be sent via interface B.
-->

* RFC 1222
    * The Strong End-System model: IPアドレスごとにMACアドレスを分ける
    * The Weak End-System model: IPアドレスでMACアドレスをシェア
        * Linuxはデフォルトでこのモデルを使用。
        * ARP Request に対して1つのMACアドレスしか返さないので、LAN内の通信では速度の早いIPだけ使われることになる場合がある。


## Address Resolution Protocol

* ARP: IP アドレスから MAC アドレスを取得する。
* RARP: MAC アドレス から IP アドレス を取得する。

### プロセス

1. あるホストが、 Broadcast で知りたい IP アドレスを送る。
    * 「このIP持っているのは誰ですか？」
    * ブロードキャストで送るデータには、送信元ホスト自身の IP アドレス と MAC アドレス を 含める。
1. 前述のブロードキャストを受け取ったホストで、IPが該当するホストは、自身がリプライするべきだとわかる。
1. ARP Cacheの更新
    * 該当ホストが 送信元を ARP Cache に追加する。
    * ブロードキャストを受け取った他のホストは、送信元ホストのエントリが ARP Cache にあれば上書きする。
        * これは、イーサネットインターフェースが交換された場合に、古いキャッシュを使ってしまわないようにするのに役立つ。
            * USB のインターフェースは簡単に交換できる。
1. 該当ホストが 送信元ホストへ ARP のリプライを送る、 または送信元LANへの "is-at" メッセージ を送る。
    * ユニキャスト (1対1の通信、ブロードキャストではない。)
    * 送信されるデータには、 MACアドレスが含まれる。

### ARP cache

* すべてのホストは ARP Cache を管理している。
* 各エントリは、 IPv4 と LAN Address (MAC Address) のペア
* ARP のブロードキャストで応答があった場合、 ブロードキャストしたホストと、応答したホストは、相手のホストをエントリに追加する。
* ARP キャッシュのエントリは、 10分程度で期限切れとなる。
    * Linux ではもっと短い間隔で期限切れになる。 (2012年では30秒以内だった)
* タイムアウトしたエントリに対するARPクエリは、最初に、ブロードキャストではなくユニキャストで、前のイーサネットアドレスに送信される。
    * ブロードキャストトラフィックの総量を削減する。
* ARPキャッシュの調べ方
    * Linux: `ip -sneigh`
    * windows: `arp-a`

### ARP Spoofing

* ホストBがホストSになりすまして、正しい接続元ホストAからのアクセスを受ける例
    1. Bは、Sのスケジュールされたダウンタイムまで待機するか、Sに対してDOS攻撃を行って、Sがダウンしている状態にする。
    1. Aが接続を試みるときに、Sを探すARPリクエストを行う。
    1. Bは B の MACAddress を Sのものとしてリプライを返す。
        * Bが自分のIPアドレスをSのIPアドレスに変更すればよい。
    1. AはBに接続し、Bにパスワードを送信する。
    1. BはSへの接続情報を手に入れる。
    1. BはAに、あとで接続を促すメッセージを返すなどする。
* SSH の相手のキーが変更されて場合に受け取るメッセージは、 ARP Spoofing の可能性を示唆している。

### ARP failover

* できること
    * サーバーAとB (Bは例えばバックアップ用) について、 Aがフリーズした場合にBが介入できるようにする。
* 手順
    1. A の IP と B の IP を同じものに設定します。
        * 当面はBがネットワークを使用しないため、この重複は問題にならない。
    1. Bは、Aがダウンしているというメッセージを取得したら、 A の IP への ARPクエリーを、 BのMACアドレスつきで送信する。
    1. ゲートウェイルータは A の ARP Cache エントリを B の MACアドレス で書き換える。

### Sniffer detection

* Sniffer を検出する
    1. あるホストAがプロミスキャスモードにあるかどうかを確認するため、ARPをAに送信する。
        * ブロードキャストイーサネットアドレスではなく、存在しないイーサネットアドレスとする。
            * ブロードキャストだとA以外も反応することがある。
            * Aが全てのパケットを見ているかをチェックしたい。
    1. 応答を確認する。
        * プロミスキャスモードがオフの場合、Aのネットワークインターフェイスはパケットを無視します。
        * プロミスキャスモードがオンの場合、AのネットワークインターフェイスはARP要求をA自体に渡し、A自体がそれに応答する可能性があります。
* Linux は ARPソフトウェアレベルで、自身以外のMACアドレスへのARPクエリを拒否する。ただし、ff：ff：ff：00：00：00やff：ff：ff：ff：ff：feなどの偽のイーサネットマルチキャストアドレスには応答する。
* プロミスキャスモード
    * イーサネットインターフェイスなどで、自分あてだけでなく、ネットワーク上を流れている全パケットを取り込む動作モード

### ARP and multihomed hosts

* ホストAが同じLAN内に2つのインターフェース (iface1\[MAC Address=A1\], iface2\[MAC Address=A2\]) を持っている場合、 それぞれのインターフェースは交換可能なものとして使われることが多い。
    * A1へのトラフィックをiface2で受信したり、A2へのトラフィックをiface1で受診したりする。
    * A1からのトラフィックをiface2で送信したり、A2からのトラフィックをiface2で送信したりする。

