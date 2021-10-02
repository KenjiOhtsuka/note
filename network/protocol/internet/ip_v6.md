---
layout: page
title: Internet Protocol version 6 (IPv6)
---

* IPv6 address
    * 128 bit
    * 種類
        * ユニキャストアドレス

            | スコープ | 名前 | |
            |:--|:--|:--|
            | グローバル | GUA | 2000::/3 |
            | サイト | ULA | fc00::/7 |
            | リンク | リンクローカル アドレス | fe80::/10 |
            | ノード | ループバック | ::1/128 |
            | 特殊 | 不定アドレス | ::/128 |


        * エニーキャストアドレス 
            * エニーキャストアドレスに送られたパケットは、そのアドレスで識別されるインタフェースの内で、ルーティングプロトコルの距離の定義に従って「最も近く」(nearest)にあるただ1つのインタフェースに配送される。
            * エニーキャストアドレスはユニキャストアドレスと同じフォーマットのため、表記上は区別がつかない。 同じアドレスが複数のインタフェースに設定されるかどうかの違いしかない。
        * マルチキャストアドレス

            | スコープ |  |
            |:--|:--|
            | グローバル | ff0e:: |
            | サイト | ff05:: |
            | リンク | ff02:: |
            | ノード | ff01:: |

    * IPv4 にあったようなブロードキャストアドレスはない。
* IP
    * header
        * 40 byte

## Neighbor Solicitation

* IPv4 の ARP に対応するもの。
    * "特定の IPv6 アドレス を持っているのは誰か"
* solicited-node マルチキャストアドレス に送られる。
    * ARP と違ってブロードキャストされない。
    * solicited-node multicast address
        * 小さなマルチキャストグループ
        * 形式は `ff02::0001:x.y.z.w` (x, y, z, w は 検索対象 IPv6 アドレスの 下位32ビット)
        * LAN内の IPv6 を持つホストは自分のアドレスが所属するすべての `solicited-node multicast address` に登録しておく必要がある。
* 定期的に繰り返される
* フォローアップの verification は最初にファイル上のユニキャストLANアドレスに送信される。
    * LAN上の他のホストは、最初の neighbor solitcitation メッセージを受け取らなくてよい (ARPとは異なる)
* Neighbor solicitation への、ターゲットホストからの返答は、 neighbor advertisement という。
    * Neighbor Solicitation は ARP リクエストに相当する。 (ICMPv6 type 135)
    * Neighbor Advertisement は ARP リプライに相当する。 (ICMPv6 type 136)
* 近隣要請には、近隣到達不能検出(Neighbor Unreachability Detection)も含まれる

### 近隣キャッシュ

* IPv6 ホスト が管理する、 トラフィックを送信した近隣ノードの一覧表。
* エントリ
    * IPv6 アドレス (キー)
    * 近隣ノードの IPv6 address
    * リンクレイヤアドレス : IPv6 アドレスに対応するリンク層アドレス
    * ルータフラグ : 近隣ノードがルータまたはホストのどちらかをあらわすフラグ
    * 到達性の状態 : 近隣ノードに到達可能か否かの確認状況
        * 状態一覧
            * 不完全 Incomplete
                * アドレス解決中。
            * 到達可能 Reacheable
            * 期限切れ Stale
            * 遅延 Delay
            * 探索中 Probe
    * その他、到達不能検出に必要な情報 : 応答のない近隣陽性の数、次の到達不能検出のための近隣養成の送信時間など

## ICMP

* 2つに分類される
    * エラーメッセージ (type 0-127)
        * IP Packet が宛先のホストまで到達しなかった場合に、エラーが発生したホストやルータによって送信される。
    * 情報メッセージ (type 128-255)
        * 128 : Echo Request (エコー要求)
        * 129 : Echo Reply
        * 130 : Multicast Listener Query
        * 131 : Multicast Listener Report
        * 132 : Multicast Listener Done
        * 133 : Router Solicitation
        * 134 : Router Advertisement
        * 135 : Neighbor Solicitation
        * 136 : Neighbor Advertisement
        * 137 : Redirect Message
        * 138 : Router Renumbering
        * 139 : ICMP Node Information Response
        * 140 : ICMP Node Information Response
        * 141 : Inverse Neighbor Discovery Solicitation
        * 142 : Inverse Neighbor Discovery Advertisement


