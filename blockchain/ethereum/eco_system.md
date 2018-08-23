---
layout: page
---

# Eco System

## Consensys

Ethereum 上のエコシステムを推進している企業。

Truffle, Drizzle も彼らのプロジェクトの一部。

### Truffle

* Solidity でスマートコントラクトを書くためのフレームワーク。
* compile, test, deploy の機能。
* 開発用ビルトインブロックチェーン機能

```sh
npm install -g truffle\
```

* Example
    ```sh
    truffle unbox metacoin
    ```

* Private Net, Test Net, Main Net の順にデプロイする。
* Test Net
    * Ropsten (PoW)
    * Kovan (PoA)
    * Rinkeby (PoA)
* Test Net, Main Net はノードを立てる必要がある。
* INFURA を使うとノードを必要とせずデプロイできる。

### Drizzle

* Redux ベース
* コントラクトの JSON を利用する。
* コントラクトの状態の取得、トランザクションの発行が楽にできる。

* Library
    * drizzle-react
    * drizzle-react-component : UI Module
    
### Relation

MetaMask, Browser - Drizzle - Truffle

## DApp game

* 2018. DApp market は 1,100億円規模
* グローバル展開し易い

### Loom SDK

DApp ごとにサイドチェーンを作ることができる。 (DAppsChain)