---
layout: page
title: Blockchain Overview
---

## ビザンチン問題とブロックチェーン

ブロックチェーンが解決しているのは、
ビザンチン問題の亜種。
ビザンチン問題では合意を取る人数が固定されているが、
ブロックチェーンでは変化しうる。
ブロックチェーンでは、一度合意に至ったブロックが破棄される場合がある。

## UTXO (Unspent Transaction Output) Model

Bitcoin で利用されているモデル。
未使用のトランザクション出力、
すなわち使われていないビットコインを
ツリールートから集計して使用可能なビットコインを計算する。
もっと単純化して言えば、入ったものから出たものを引いて残ったものが残高。
残高そのものはデータとして保持していない。

## Blockchain 2.0

Bitcoin のために開発されたブロックチェーンを仮想通貨外のものに応用する活動

### プラットフォーム

* Ethereum
* Eris
    * 企業向け
    * 金融機関の利用を想定
    * SDK あり
    * MONAX
* HyperChain
    * Ethereum の拡張版
    * 許可が必要な分散台帳 Permissioned Distributed Ledgers
    * コンソーシアム型またはプライベート型のブロックチェーンを想定
* Hyperledger
    * Linux Foundation が創設
* Rootstock
    * RSK Labs が開発

### サービス事例

#### 送金・決済

* Circle
    * ビットコインによる個人間送金サービス

#### 信用情報

* KYC-Chain
    * 信用情報データベース
    * Ethereum で運用
* Bitnation
* Augur

#### 公証サービス

* Proof of Existence
    * Bitcoin の OP_RETURN の後にハッシュを入れる。
* Stampery
    * オンライン公証サービス。
    * マドリードで創設。
    * ダニエレ・レヴィ、ルイス・アイヴァン・クエンが作った。
    * [Web Site](https://stampery.com/)
    * Blockchain Timestamping Architecture (BTA)
* Tierion
    * ｳｪｲﾝ･ｳﾞｫｰﾝが作った。
    * ヘルスケア分野へのブロックチェーン利用をフィリップスとともに探る。
    * [Web Site](https://tierion.com/)
    * Chainpoint

記録したいハッシュ値をマークルTreeにより集約して、
そのツリーのルート情報をトランザクションに記録する方式。
これで多くのハッシュ値を効率よくブロックチェーンに記録できる。

* Bitproof

#### 証券発行・管理

* Symbiont
    * 株式発行、分割、配当支払



#### 登記

* スウェーデン
    * 土地登記
    * ChromaWay, Kairos Future, Telia が参画
* ジョージア
    * 土地登記
* ホンジュラス
    * Factom との共同プロジェクト
    * 土地登記
* BitNation
    * 土地や権利の登記をブロックチェーンで行うプロジェクト

#### 不動産

* Harbor
* Propy
* Securitize
* Templum

#### 資産管理

* Everledger
    * 2015年から開始
    * ダイヤモンド取引
    * ダイヤモンドの固有情報、シリアル番号、所有者の情報を記録
        * ダイヤモンドの固有情報とは、色、透明度、カラット、カット等
          観点書に記録される情報のこと
    * API提供
* Balance3
    * 金融データの自動記録・計算・管理

#### 金融商品

* Hedgy
    * 複雑な条件付き金融商品の執行管理
* DocuSign
    * 契約・決済
* VISA
* Taqanu ドイツ
    * 銀行口座を開設する
* MONI フィンランド
    * 難民のためのプリペイドマスターカード
    * コンセプトはTaqanuに近い

#### サプライチェーン

* Provenance
    * 生産の詳細、生産物IDを記録。 トレーサビリティの確保。
* BlockVerify
* ウォルマート

#### 医療

* BitHealth
    * 医療情報を暗号化して埋め込む
* Factom
    * HealthNautica とパートナーを組んでいる。
    * ブロックチェーンを使った医療情報の管理。
    * 診療記録の Hash値を記録。
* MedRec
    * 臨床試験
    * がん検査

#### 投票

* CongreChain
    * Open Asset Protocol
    * Colored Coin

#### C2C

* OpenBazaar
    * 購入希望者、販売者、仲介者でマルチしぐアカウントを作成して
      2人が署名をすればアカウントから出勤デキうるようにしておく。

#### シェアリングサービス

* Arcade City
    * ドライバーと利用者のマッチング
    * 利用者は乗車・降車したい場所をブロックチェーンに書き込む。
* La'Zooz
    * ある目的地に向かうドライバーの空席を同じ方向に行きたい人に提供。
*  Slock.it
    * 第三者を介さずに決済
    * ドアロックなどの管理

#### IoT

* ADEPT (Autonomous Decentralized Peer-to-Peer Telemetry) - IBM
    * 消費財の発注にブロックチェーンとIoTのセンサを用いる。
* Slock.it ドイツ
    * スマートロックをブロックチェーンと連携。
* Nayuta 日本 福岡
    * 電源ソケットをIoT化して電源使用権をブロックチェーンで取引。
* 太陽光パネルからの電力を証券化して取引
    * [Filament](https://filament.com/)
    * L03
    * [Sun Exchange](https://www.thesunexchange.com)
    * Power Ledger
        * Ledger Asset と共同開発
        * ソーラー発電電力を個人が売買できる。
* ビットプロパティ 日本
    * 再生可能エネルギープラットフォームBTP

#### モーゲージ

* Trussle

#### 決済

* Wave
    * 貿易の決済
    * Letter of Credit のやりとり

#### 著作権管理

DRM - Digital Rights Management

* Ascribe
* Blockai
    * 画像。 OP_RETURN の後に情報を埋め込む
* MediaChain
* KODAKone
* iText
* Muse
* Revelator
* Ujo Music
* Maecenas
* Artlery

#### Other

* R3
    * R3CEV 手動 の ブロックチェーンプロジェクト
* The Elements Project
    * Blockstream 社
    * サイドチェーンのプロジェクト
* The Sun Exchange
    * ビットコインでソーラーパネルを買う
* CarbonX
    * エコな活動をするとコインがもらえる。


#### Related

* Chainstarter
    * 社会に良い影響をもたらす活動のICO支援プラットフォーム

## Document

* Smamrt ContractsL 12 Use Cases for Business & Beyond
    * 米国でブロックチェーン・スマートコントラクトのビジネス適用について
        イニシアチブを担っているデジタル商工会議所によるドキュメント

## ブロックチェーンと分散台帳

ブロックチェーン、分散台帳と呼ばれるソフトウェアには、
ビットコインのようにブロック単位で情報をまとめるものや、
別の形で取引情報の前後関係の情報を管理するものもある。

## ProTech 3.0

ある教授が書いた不動産関連の技術文書。
