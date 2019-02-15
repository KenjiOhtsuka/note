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
npm install -g truffle
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
* in `truffle.js`, we can change the port.


### Drizzle

* Redux ベース
* コントラクトの JSON を利用する。
* コントラクトの状態の取得、トランザクションの発行が楽にできる。

* Library
    * drizzle-react
    * drizzle-react-component : UI Module
    
### Ganache

* Ethereum ブロックチェーン の Javascript 実装
    * geth を追加でインストールする必要がない
* mnemonicとアカウント情報の可視化
* ブロックチェーンのログを出力してくれる
* マイニング時間を設定できる
* ブロックエクスプローラが組み込まれている
* Byzantium 標準装備
    * DApp 開発 のための機能

* 起動時
    * Ethereum の ブロックチェーンを構築し、 アドレスを10個生成
    * それぞれのアドレスに100ETHずつ準備
    * 再起動するだけでブロックチェーンを作り直してくれる

```sh
# install
npm install -g ganache-cli
# launch
ganache-cli
ganache-cli --port 7545
ganache-cli -p 7545
```


    
### Relation

MetaMask, Browser - Drizzle - Truffle

## DApp game

* 2018. DApp market は 1,100億円規模
* グローバル展開し易い

### Loom SDK

DApp ごとにサイドチェーンを作ることができる。 (DAppsChain)
