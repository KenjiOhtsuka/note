---
layout: page
title: Asynchronous Transfer Mode
---


ATMセルに付加される5バイトのヘッダは、端末-ネットワーク間で使用するUNI（User Network Interface）とネットワーク同士の間で使用するNNI（Node Network Interface）とで異なる。UNIの場合、GFC（Generic Flow Control：汎用フロー制御）が4ビット、ATMの宛先を決定するVPI（Virtual Path Indentifier：仮想識別子）が8ビット、VCI（Virtual Channel Identifier：仮想チャネル識別子）が16ビット、輻輳の有無や輻輳の度合いにおけるATMセルの優先度を決めるPT（Payload Type：ペイロードタイプ）が3ビット、CLP（Cell Loss Priority：輻輳損失プライオリティ）が1ビット、ヘッダのエラー検出を行うHEC（Header Error Control：ヘッダエラー制御）が8ビットの6つの情報からなる。NNIの場合は、GFCを除いた5種類の情報となるが、VPIが12ビットとなり、全体で5バイトである点は変わらない。
