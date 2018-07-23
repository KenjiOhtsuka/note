---
layout: page
---

# Merkle Tree

バイナリハッシュツリーとも呼ばれる。
大きなデータセットを効率的に要約・検証するために使用されるデータ構造。

## なぜ Merkle Tree は重要なのか

Merkle Tree がなくてもブロックチェーン自体は作成可能。

### Merkle Tree によって可能になること

1. あるトランザクションがブロックに取り込まれているかを検証すること。
1. ブロック全体をダウンロードしない、ライトなクライアント。
1. スケーラビリティ
1. SPV (後述)

#### Merkle Proof

Merkle Tree にあるトランザクションが取り込まれているかを検証するには......

* Merkle Root Hash
    * Hash 01
        * Hash 0: Tx 0
        * Hash 1: Tx 1
    * Hash 23
        * Hash 2: Tx 2
        * Hash 3: Tx 3

たとえば Tx 3 がブロックに取り込まれていることを検証するには、
フルノードに対して、 Merkle Root Hash, Hash 01, Hash 2, Tx 3 を要求する。
Tx 3 よりハッシュの計算をはじめ、
最終的に Merkle Root Hash が計算できることを検証する。


## SPV (Simplified Payment Verification)

ツリー全体をダウンロードせずに
特定のトランザクションがブロックに取り込まれているかを検証する方法。
