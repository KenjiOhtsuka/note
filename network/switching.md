---
layout: page
title: Switching
---

* 電話システムは2つの主要な部分に分けられる。
    * 外部プラント（物理的に交換局の外部にあるため、ローカルループとトランク）
    * 内部プラント（内部にあるスイッチ）
        *　ネットワークでは2つの異なるスイッチング技術が使用されている。
            * 回線交換
                * 従来の電話システム
            * パケット交換
                * VoIP技術の台頭とともに浸透

## Circuit switching 回線交換

* 物理的な経路を探す。
* 初期の電話では、回線交換はオペレータによって行われていた。
    * 通話が終了するまで回線は維持される。
* データを送信する前にエンドツーエンドのパスを設定する必要がある。
    * 送信側から受信側までの帯域幅の予約
* 遠距離通話や国際電話の場合はパス設定時間が長くなる。
* 輻輳しない
* データは送信した順で到着する。

## Packet switching パケット交換

* パケットは利用可能になるとすぐに送信される。
* (回線交換とは異なり) 事前に専用パスを設定しなくてよい。
* 各パケットを宛先に送信するのはルーター次第。
* 固定パスがないため、送信時のネットワークの状態に応じて、さまざまなパケットがさまざまなパスをたどることがあり、順序が狂って到着する可能性がある。
* パケット交換ネットワークでは、パケットのサイズに厳しい上限があります。
* ユーザーが伝送ラインを非常に長い間（たとえば、数ミリ秒）独占できない。
* パケット交換ネットワークは対話型トラフィックを処理できる。
* 長いメッセージの最初のパケットは2番目のパケットが完全に到着する前に転送されるため、遅延が減少する。ただし、パケットがルーターのメモリに送信される前に、ルーターのメモリにパケットが蓄積されるストアアンドフォワードの遅延
* 帯域幅が予約されていないため、パケットは転送されるまで待機する場合がある。
    * 同時に多数のパケットが送信されると、キューイングの遅延と輻輳が発生する。
    * ビジー信号を受信して​​ネットワークを使用できなくなることはない
    

## 違い

* 電話回線
回線が特定のユーザー用に予約されていて、トラフィックがない場合、その帯域幅は無駄になります。他のトラフィックには使用できません。パケット交換は帯域幅を浪費しないため、システムの観点からより効率的です。このトレードオフを理解することは、回線交換とパケット交換の違いを理解するために重要です。トレードオフは、サービスを保証してリソースを浪費することと、サービスを保証せずにリソースを浪費しないこととの間です。
* パケット交換は、回線交換よりもフォールトトレラント
    * 実際、それが発明された理由です。
    * 回線交換では、スイッチがダウンすると、それを使用しているすべての回線が終端され、どの回線でもトラフィックを送信できなくなる。
    * パケット交換では、パケットをデッドスイッチの周りにルーティングできる。
* 課金アルゴリズムです。
    * 回線交換では、充電は歴史的に距離と時間に基づいていた。
        * 携帯電話の場合、国際電話を除いて、通常、距離は重要ではなく、時間は大まかな役割しか果たさない（たとえば、2000分の無料通話プランは1000の無料通話料金よりも高く、夜間や週末は安い場合がある） 。
    * パケット交換では、接続時間は問題ではないが、トラフィックの量は問題になる。
        * ホームユーザーの場合、ISPは通常、月額定額料金を請求する。 ISPの作業が少なく、顧客がこのモデルを理解できるため。 バックボーンキャリアは、トラフィックの量に基づいて地域ネットワークに請求する。

## その他

* 一部の古いコンピュータネットワークは、内部で回線交換されており（X.25など）、一部の新しい電話ネットワークは、Voice over IP を使用したパケット交換を使用している。
*　VoIP
    * ユーザーにとっては外部の標準的な電話と同じように見えるが、ネットワークの内部では音声データのパケットが交換される。
    * テレホンカードを介して安価な国際電話を市場に投入できるようになったが、既存の通話品質よりも通話品質は低い。
* 輻輳は、回線交換（セットアップ時）とパケット交換（パケットが送信されるとき）