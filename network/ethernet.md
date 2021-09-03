---
layout: page
title: Ethernet
---



## Frame

| Name | Size | Description | Note |
|:--|--:|:--|:--|
| プリアンブル | 7 byte | | チップが生成 |
| フレーム開始識別 | 1 byte | `10101011` | チップが生成 |
| 宛先イーサネットアドレス | 6 byte | イーサネットMACアドレス | |
| 送信元イーサネットアドレス | 6 byte | |