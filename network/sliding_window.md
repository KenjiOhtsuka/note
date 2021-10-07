---
layout: page
title: Slidng Window
---

* build reliable data-transport layers on top of unreliable lower layers.
    * **retransmit-on-timeout policy**
        * パケットが送信され、タイムアウト前に確認応答がない場合、パケットは再送信される。
        * 一方の側が retransmit-on-timeout を実装するプロトコルは、ARQ(Automatic Repeat reQuest, 自動再送要求)プロトコルとして知られている。
    * ネットワークがサポートできる限りの多くのパケットを転送中に保持する必要がある。このための戦略は、**スライディングウィンドウ**として知られる。
    * **エンドツーエンド原則**
        * 下の層に信頼性を構築することにより、信頼性の高いトランスポート層を達成しようとすると大変になる。
        * 接続のエンドポイントに信頼性を実装するのが、正しい方針。

