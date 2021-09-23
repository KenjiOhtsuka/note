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

## Address Resolution Protocol

* ARP: IP アドレスから MAC アドレスを取得する。
* RARP: MAC アドレス から IP アドレス を取得する。

### プロセス

1. あるホストが、 Broadcast で知りたい IP アドレスを送る。
    * 「このIP持っているのは誰ですか？」
    * ブロードキャストで送るデータには、送信元ホスト自身の IP アドレス と MAC アドレス を 含める。
2. 前述のブロードキャストを受け取ったホストで、IPが該当するホストは、自身がリプライするべきだとわかる。
3. 該当ホストが 送信元ホストへ ARP のリプライを送る、 または送信元LANへの "is-at" メッセージ を送る。
    * ユニキャスト (1対1の通信、ブロードキャストではない。)
    * 送信されるデータには、 MACアドレスが含まれる。

### ARP cache



<!--
Additionally, all hosts maintain an ARP cache, consisting of ⟨IPv4,LAN⟩ address pairs for other hosts on the network. After the exchange above, A has ⟨DIP,DLAN⟩ in its table; anticipating that A will soon send it a packet to which it needs to respond, D also puts ⟨AIP,ALAN⟩ into its cache.

ARP-cache entries eventually expire. The timeout interval used to be on the order of 10 minutes, but Linux systems now use a much smaller timeout (~30 seconds observed in 2012). Somewhere along the line, and probably related to this shortened timeout interval, repeat ARP queries about a timed-out entry are first sent unicast, not broadcast, to the previous Ethernet address on record. This cuts down on the total amount of broadcast traffic; LAN broadcasts are, of course, still needed for new hosts. The ARP cache on a Linux system can be examined with the command ip -s neigh; the corresponding windows command is arp -a.

The above protocol is sufficient, but there is one further point. When A sends its broadcast “who-has D?” ARP query, all other hosts C check their own cache for an entry for A. If there is such an entry (that is, if AIP is found there), then the value for ALAN is updated with the value taken from the ARP message; if there is no pre-existing entry then no action is taken. This update process serves to avoid stale ARP-cache entries, which can arise is if a host has had its Ethernet interface replaced. (USB Ethernet interfaces, in particular, can be replaced very quickly.)

ARP is quite an efficient mechanism for bridging the gap between IPv4 and LAN addresses. Nodes generally find out neighboring IPv4 addresses through higher-level protocols, and ARP then quickly fills in the missing LAN address. However, in some Software-Defined Networking (2.8   Software-Defined Networking) environments, the LAN switches and/or the LAN controller may have knowledge about IPv4/LAN address correspondences, potentially making ARP superfluous. The LAN (Ethernet) switching network might in principle even know exactly how to route via the LAN to a given IPv4 address, potentially even making LAN addresses unnecessary. At such a point, ARP may become an inconvenience. For an example of a situation in which it is necessary to work around ARP, see 18.9.5   loadbalance31.py.
-->