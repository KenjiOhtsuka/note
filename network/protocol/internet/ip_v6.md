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
        * 形式は `ff02::0001:xyzw` (x, y, z, w は 検索対象 IPv6 アドレスの 下位32ビット)
        * LAN内の IPv6 を持つホストは自分のアドレスが所属するすべての solicited-node multicast address に登録しておく必要がある。
* 定期的に繰り返される
* フォローアップの verification は最初にファイル上のユニキャストLANアドレスに送信される。
    * LAN上の他のホストは、最初の neighbor solitcitation メッセージを受け取らなくてよい (ARPとは異なる)
* Neighbor solicitation への、ターゲットホストからの返答は、 neighbor advertisement という。
    * Neighbor Solicitation は ARP リクエストに相当する。 (ICMPv6 type 135)
    * Neighbor Advertisement は ARP リプライに相当する。 (ICMPv6 type 136)

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




<!--
ホストは、LANアドレスが変更された可能性があると信じる場合、これらを一方的に送信することもあります。

ノードが別のノードに代わってネイバーアドバタイズメントを送信できるという点で、プロキシARPの類似物は引き続き許可されます。これの最も可能性の高い理由は、プロキシサービスを受信するノードが、ホームLANから一時的に離れた「モバイル」ホストであるためです。プロキシとして送信されるネイバーアドバタイズメントには、実際のターゲットが発言した場合、プロキシアドバタイズメントを無視する必要があることを示すフラグがあります。

ノード（ホストまたはルーター）が近隣要請を通じて近隣のLANアドレスを検出すると、ノードは引き続き近隣の継続的な到達可能性を監視します。

近隣要請には、近隣到達不能検出も含まれます。各ノード（ホストまたはルーター）は、既知のネイバーを引き続き監視します。到達可能性は、進行中のIPv6トラフィック交換または近隣アドバタイズメント応答のいずれかから推測できます。近隣ホストが到達不能になったことをノードが検出した場合、近隣のLANアドレスが単に変更された場合、元のノードはマルチキャスト近隣要請プロセスを再試行できます。ノードは、隣接ルーターが到達不能になったことを検出すると、代替パスを見つけようとします。

最後に、IPv4ICMPリダイレクトメッセージもIPv6で近隣探索プロトコルに移動されました。これらにより、ルーターは、特定の宛先へのトラフィックを処理するために別のルーターが適切に配置されていることをホストに通知できます。
-->

<!--
a host may also send these unsolicited if it believes its LAN address may have changed.

The analogue of Proxy ARP is still permitted, in that a node may send Neighbor Advertisements on behalf of another. The most likely reason for this is that the node receiving proxy services is a “mobile” host temporarily remote from the home LAN. Neighbor Advertisements sent as proxies have a flag to indicate that, if the real target does speak up, the proxy advertisement should be ignored.

Once a node (host or router) has discovered a neighbor’s LAN address through Neighbor Solicitation, it continues to monitor the neighbor’s continued reachability.

Neighbor Solicitation also includes Neighbor Unreachability Detection. Each node (host or router) continues to monitor its known neighbors; reachability can be inferred either from ongoing IPv6 traffic exchanges or from Neighbor Advertisement responses. If a node detects that a neighboring host has become unreachable, the original node may retry the multicast Neighbor Solicitation process, in case the neighbor’s LAN address has simply changed. If a node detects that a neighboring router has become unreachable, it attempts to find an alternative path.

Finally, IPv4 ICMP Redirect messages have also been moved in IPv6 to the Neighbor Discovery protocol. These allow a router to tell a host that another router is better positioned to handle traffic to a given destination.

8.6.4   Security and Neighbor Discovery
In the protocols outlined above, received ND messages are trusted; this can lead to problems with nodes pretending to be things they are not. Here are two examples:

A host can pretend to be a router simply by sending out Router Advertisements; such a host can thus capture traffic from its neighbors, and even send it on – perhaps selectively – to the real router.
A host can pretend to be another host, in the IPv6 analog of ARP spoofing (7.9.2   ARP Security). If host A sends out a Neighbor Solicitation for host B, nothing prevents host C from sending out a Neighbor Advertisement claiming to be B (after previously joining the appropriate multicast group).
These two attacks can have the goal either of eavesdropping or of denial of service; there are also purely denial-of-service attacks. For example, host C can answer host B’s DAD queries (below at 8.7.1   Duplicate Address Detection) by claiming that the IPv6 address in question is indeed in use, preventing B from ever acquiring an IPv6 address. A good summary of these and other attacks can be found in RFC 3756.

These attacks, it is worth noting, can only be launched by nodes on the same LAN; they cannot be launched remotely. While this reduces the risk, though, it does not eliminate it. Sites that allow anyone to connect, such as Internet cafés, run the highest risk, but even in a setting in which all workstations are “locked down”, a node compromised by a virus may be able to disrupt the network.

RFC 4861 suggested that, at sites concerned about these kinds of attacks, hosts might use the IPv6 Authentication Header or the Encapsulated Security Payload Header to supply digital signatures for ND packets (see 22.11   IPsec). If a node is configured to require such checks, then most ND-based attacks can be prevented. Unfortunately, RFC 4861 offered no suggestions beyond static configuration, which scales poorly and also rather completely undermines the goal of autoconfiguration.

A more flexible alternative is Secure Neighbor Discovery, or SEND, specified in RFC 3971. This uses public-key encryption (22.9   Public-Key Encryption) to validate ND messages; for the remainder of this section, some familiarity with the material at 22.9   Public-Key Encryption may be necessary. Each message is digitally signed by the sender, using the sender’s private key; the recipient can validate the message using the sender’s corresponding public key. In principle this makes it impossible for one message sender to pretend to be another sender.

In practice, the problem is that public keys by themselves guarantee (if not compromised) only that the sender of a message is the same entity that previously sent messages using that key. In the second bulleted example above, in which C sends an ND message falsely claiming to be B, straightforward applications of public keys would prevent this if the original host A had previously heard from B, and trusted that sender to be the real B. But in general A would not know which of B or C was the real B. A cannot trust whichever host it heard from first, as it is indeed possible that C started its deception with A’s very first query for B, beating B to the punch.

A common solution to this identity-guarantee problem is to create some form of “public-key infrastructure” such as certificate authorities, as in 22.10.2.1   Certificate Authorities. In this setting, every node is configured to trust messages signed by the certificate authority; that authority is then configured to vouch for the identities of other nodes whenever this is necessary for secure operation. SEND implements its own version of certificate authorities; these are known as trust anchors. These would be configured to guarantee the identities of all routers, and perhaps hosts. The details are somewhat simpler than the mechanism outlined in 22.10.2.1   Certificate Authorities, as the anchors and routers are under common authority. When trust anchors are used, each host needs to be configured with a list of their addresses.

SEND also supports a simpler public-key validation mechanism known as cryptographically generated addresses, or CGAs (RFC 3972). These are IPv6 interface identifiers that are secure hashes (22.6   Secure Hashes) of the host’s public key (and a few other non-secret parameters). CGAs are an alternative to the interface-identifier mechanisms discussed in 8.2.1   Interface identifiers. DNS names in the .onion domain used by TOR also use CGAs.

The use of CGAs makes it impossible for host C to successfully claim to be host B: only B will have the public key that hashes to B’s address and the matching private key. If C attempts to send to A a neighbor advertisement claiming to be B, then C can sign the message with its own private key, but the hash of the corresponding public key will not match the interface-identifier portion of B’s address. Similarly, in the DAD scenario, if C attempts to tell B that B’s newly selected CGA address is already in use, then again C won’t have a key matching that address, and B will ignore the report.

In general, CGI addresses allow recipients of a message to verify that the source address is the “owner” of the associated public key, without any need for a public-key infrastructure (22.9.3   Trust and the Man in the Middle). C can still pretend to be a router, using its own CGA address, because router addresses are not known by the requester beforehand. However, it is easier to protect routers using trust anchors as there are fewer of them.

SEND relies on the fact that finding two inputs hashing to the same 64-bit CGA is infeasible, as in general this would take about 264 tries. An IPv4 analog would be impossible as the address host portion won’t have enough bits to prevent finding hash collisions via brute force. For example, if the host portion of the address has ten bits, it would take C about 210 tries (by tweaking the supplemental hash parameters) until it found a match for B’s CGA.

SEND has seen very little use in the IPv6 world, partly because IPv6 itself has seen such slow adoption, but also because of the perception that the vulnerabilities SEND protects against are difficult to exploit.

RA-guard is a simpler mechanism to achieve ND security, but one that requires considerable support from the LAN layer. Outlined in RFC 6105, it requires that each host connects directly to a switch; that is, there must be no shared-media Ethernet. The switches must also be fairly smart; it must be possible to configure them to know which ports connect to routers rather than hosts, and, in addition, it must be possible to configure them to block Router Advertisements from host ports that are not router ports. This is quite effective at preventing a host from pretending to be a router, and, while it assumes that the switches can do a significant amount of packet inspection, that is in fact a fairly common Ethernet switch feature. If Wi-Fi is involved, it does require that access points (which are a kind of switch) be able to block Router Advertisements; this isn’t quite as commonly available. In determining which switch ports are connected to routers, RFC 6105 suggests that there might be a brief initial learning period, during which all switch ports connecting to a device that claims to be a router are considered, permanently, to be router ports.
-->

<!--
.6.4セキュリティと近隣探索
上で概説したプロトコルでは、受信したNDメッセージは信頼されます。これにより、ノードがそうではないものになりすますという問題が発生する可能性があります。次に2つの例を示します。

ホストは、ルーターアドバタイズメントを送信するだけで、ルーターのふりをすることができます。したがって、このようなホストは、ネイバーからのトラフィックをキャプチャし、実際のルーターに（おそらく選択的に）送信することもできます。
ホストは、ARPスプーフィングのIPv6アナログ（7.9.2 ARPセキュリティ）で、別のホストのふりをすることができます。ホストAがホストBの近隣要請を送信する場合、ホストCがBであると主張する近隣アドバタイズメントを送信することを妨げるものは何もありません（以前に適切なマルチキャストグループに参加した後）。
これらの2つの攻撃には、盗聴またはサービス拒否のいずれかの目的があります。純粋にサービス拒否攻撃もあります。たとえば、ホストCは、問題のIPv6アドレスが実際に使用されていると主張することで、ホストBのDADクエリ（以下の8.7.1重複アドレス検出）に応答でき、BがIPv6アドレスを取得するのを防ぎます。これらの攻撃やその他の攻撃の概要については、RFC3756。

これらの攻撃は、注目に値することですが、同じLAN上のノードによってのみ開始できます。リモートで起動することはできません。これによりリスクは軽減されますが、排除されるわけではありません。インターネットカフェなど、誰でも接続できるサイトが最もリスクが高くなりますが、すべてのワークステーションが「ロックダウン」されている状況でも、ウイルスに感染したノードがネットワークを混乱させる可能性があります。

RFC 4861は、この種の攻撃が懸念されるサイトでは、ホストがIPv6認証ヘッダーまたはカプセル化されたセキュリティペイロードヘッダーを使用して、NDパケットのデジタル署名を提供する可能性があることを示唆しています（ 22.11 IPsecを参照）。ノードがそのようなチェックを要求するように構成されている場合、ほとんどのNDベースの攻撃を防ぐことができます。不幸にも、RFC 4861は、静的構成以外の提案を提供していませんでした。これは、拡張性が低く、自動構成の目標を完全に損なうものです。

より柔軟な代替手段は、で指定されているSecure Neighbor Discovery（SEND）です。RFC3971。これは、公開鍵暗号化（ 22.9公開鍵暗号化）を使用してNDメッセージを検証します。このセクションの残りの部分では、 22.9公開鍵暗号化の資料にある程度精通している必要がある場合があります。各メッセージは、送信者の秘密鍵を使用して、送信者によってデジタル署名されます。受信者は、送信者の対応する公開鍵を使用してメッセージを検証できます。原則として、これにより、あるメッセージ送信者が別の送信者になりすますことは不可能になります。

実際には、問題は、公開鍵自体が（侵害されていない場合でも）メッセージの送信者がその鍵を使用して以前にメッセージを送信したのと同じエンティティであることのみを保証することです。上記の2番目の箇条書きの例では、Cが誤ってBであると主張するNDメッセージを送信しますが、元のホストAが以前にBから連絡を取り、その送信者が本物のBであると信頼している場合、公開鍵を直接適用することでこれを防ぐことができます。一般に、AはBとCのどちらが本物のBであるかを知りません。Aが最初に聞いたホストを信頼することはできません。CがBに対する最初のクエリでBを打ち負かし、欺瞞を開始した可能性があるからです。

このID保証の問題に対する一般的な解決策は、22.10.2.1認証局のように、認証局などの何らかの形式の「公開鍵インフラストラクチャ」を作成することです。この設定では、すべてのノードが認証局によって署名されたメッセージを信頼するように構成されています。次に、その権限は、安全な操作に必要な場合はいつでも、他のノードのIDを保証するように構成されます。SENDは、独自のバージョンの認証局を実装します。これらはトラストアンカーとして知られています。これらは、すべてのルーター、場合によってはホストのIDを保証するように構成されます。詳細は、22.10.2.1認証局で概説されているメカニズムよりもいくらか単純です。、アンカーとルーターは共通の権限の下にあるため。トラストアンカーを使用する場合は、各ホストにアドレスのリストを設定する必要があります。

SENDは、暗号で生成されたアドレス、またはCGA（CGA）と呼ばれるより単純な公開鍵検証メカニズムもサポートします。RFC 3972）。これらは、ホストの公開鍵（およびその他のいくつかの非秘密パラメーター）のセキュアハッシュ（ 22.6セキュアハッシュ）であるIPv6インターフェイス識別子です。CGAは、 8.2.1インターフェイス識別子で説明されているインターフェイス識別子メカニズムの代替手段です。TORが使用する.onionドメインのDNS名もCGAを使用します。

CGAsの使用が正常にそれが不可能ホストCになり、ホストBであると主張する：唯一のBは、公開鍵Bのアドレスにハッシュことがありますと一致する秘密鍵を。CがBであると主張する近隣アドバタイズメントをAに送信しようとすると、Cは独自の秘密鍵を使用してメッセージに署名できますが、対応する公開鍵のハッシュはBのアドレスのインターフェイス識別子部分と一致しません。同様に、DADシナリオでは、CがBに新しく選択されたCGAアドレスがすでに使用されていることを伝えようとすると、Cはそのアドレスに一致するキーを持たず、Bはレポートを無視します。

一般に、CGIアドレスを使用すると、メッセージの受信者は、公開鍵インフラストラクチャ（22.9.3 Trust and the Man in the Middle）を必要とせずに、送信元アドレスが関連する公開鍵の「所有者」であることを確認できます。Cは、独自のCGAアドレスを使用して、ルーターのふりをすることができます。これは、ルーターアドレスがリクエスターによって事前に認識されていないためです。ただし、トラストアンカーの数が少ないため、トラストアンカーを使用してルーターを保護する方が簡単です。

SENDは、同じ64ビットCGAにハッシュする2つの入力を見つけることは実行不可能であるという事実に依存しています。これは、一般に、これには約264回の試行が必要になるためです。アドレスホスト部分にはブルートフォースによるハッシュ衝突の検出を防ぐのに十分なビットがないため、IPv4アナログは不可能です。アドレスのホスト部が10ビットを有する場合、例えば、それは約2 Cを取る10がBのCGAの一致を見つけるまで試みる（補助ハッシュパラメータを微調整することにより）。

SENDは、IPv6自体の採用が非常に遅いこともあり、SENDが保護する脆弱性を悪用するのが難しいという認識もあり、IPv6の世界ではほとんど使用されていません。

RA-guardは、NDセキュリティを実現するためのより単純なメカニズムですが、LAN層からのかなりのサポートが必要です。で概説RFC 6105では、各ホストがスイッチに直接接続する必要があります。つまり、共有メディアイーサネットがあってはなりません。スイッチもかなりスマートでなければなりません。それをルーターではなく、ホストに接続するポートを知るためにそれらを設定することは可能でなければならない、そして、加えて、ホストポートからルータ広告をブロックするように設定することが可能でなければならないではありませんルーターポート。これは、ホストがルーターのふりをするのを防ぐのに非常に効果的であり、スイッチが大量のパケット検査を実行できることを前提としていますが、これは実際にはかなり一般的なイーサネットスイッチ機能です。Wi-Fiが関係している場合、アクセスポイント（一種のスイッチ）がルーターアドバタイズメントをブロックできる必要があります。これは一般的に利用できるほどではありません。どのスイッチポートがルーターに接続されているかを判断する際に、RFC 6105は、ルーターであると主張するデバイスに接続しているすべてのスイッチポートが、永続的にルーターポートであると見なされる短い初期学習期間がある可能性があることを示唆しています。
-->
