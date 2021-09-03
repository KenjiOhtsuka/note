---
layout: page
title: Asynchronous Transfer Mode
---


* データ転送単位: cell と呼ぶ
    * Cell is 53 byte, fixed size.
        * Structure
            * Header: 5 byte
            * Data: 48 byte 
        * 中継・受信処理が単純で高速化しやすい
            * 遅延を抑えやすい。
        * 大容量のデータを伝送では効率が悪化する。
* Protocol in Data Link (2nd) Layer in OSI Reference Model
    * TCP/IP is often used together.
* 回線交換方式と異なり通信経路を占有しない
    * 回線網を共用でき、通信効率を高めやすい。
* ビットレートや情報の種類が異なる複数の通信（音声通話とテレビ電話など）を一つの通信網に混在させられる。
* 音声電話を高度化して高速データ通信を行うB-ISDN構想から生まれた通信事業者の基幹回線網などで利用されてきたが、高速・遠距離のイーサネット（Ethernet）接続などに取って代わられつつある。

## ATM Cell

User Network Interface (UNI) and Node Network Interface (NNI).

### User Network Interface

#### Cell header structure

| Name | Size | Description |
|:--|--:|:--|
| Generic Flow Control | 4 bit | 汎用フロー制御。 |
| Virtual Path Identifier | 8 bit | 仮想識別子。 宛先を決定する。 |
| Virtual Channel Identifier | 16 bit | 仮想チャネル識別子。 |
| Payload Type | 3 bit | ペイロードタイプ。 輻輳の有無や度合いにおけるセルの優先度を決める。 |
| Cell Loss Priority | 1 bit | 損失プライオリティ。 |
| Header Error Control | 8 bit | ヘッダのエラー検出を行う。 |

#### Node Network Identifier

| Name | Size | Description |
|:--|--:|:--|
| Virtual Path Identifier | 12 bit | 仮想識別子。 宛先を決定する。 |
| Virtual Channel Identifier | 16 bit | 仮想チャネル識別子。 |
| Payload Type | 3 bit | ペイロードタイプ。 輻輳の有無や度合いにおけるセルの優先度を決める。 |
| Cell Loss Priority | 1 bit | 損失プライオリティ。 |
| Header Error Control | 8 bit | ヘッダのエラー検出を行う。 |
