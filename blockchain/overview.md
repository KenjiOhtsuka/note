# Blockchain Technology

## UTXO (Unspent Transaction Output) Model

Bitcoin で利用されているモデル。
未使用のトランザクション出力、
すなわち使われていないビットコインを
ツリールートから集計して使用可能なビットコインを計算する。
もっと単純化して言えば、入ったものから出たものを引いて残ったものが残高。
残高そのものはデータとして保持していない。

## Blockchain 2.0

Bitcoin のために開発されたブロックチェーンを仮想通貨外のものに応用する活動・

### 公証サービス

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

### 登記

* スウェーデン
    * 土地投機
    * ChromaWay, Kairos Future, Telia が参画
* ジョージア
    * 土地登記
* ホンジュラス
    * Factom との共同プロジェクト
    * 土地登記
* BitNation
    * 土地や権利の登記をブロックチェーンで行うプロジェクト

### 資産管理

* Everledger
    * ダイヤモンド取引
    * ダイヤモンドの固有情報、シリアル番号、所有者の情報を記録
        * ダイヤモンドの固有情報とは、色、透明度、カラット、カット等
          観点書に記録される情報のこと
    * API提供

### サプライチェーン

* Provenance
    * 生産の詳細、生産物IDを記録。 トレーサビリティの確保。

### 医療

* BitHealth
    * 医療情報を暗号化して埋め込む
* Factom
    * HealthNautica とパートナーを組んでいる。
    * ブロックチェーンを使った医療情報の管理。
    * 診療記録の Hash値を記録。

### 投票

* CongreChain
    * Open Asset Protocol
    * Colored Coin

### C2C

* OpenBazaar
    * 購入希望者、販売者、仲介者でマルチしぐアカウントを作成して
      2人が署名をすればアカウントから出勤デキうるようにしておく。

### シェアリングサービス

* Arcade City
    * ドライバーと利用者のマッチング
    * 利用者は乗車・降車したい場所をブロックチェーンに書き込む。
* La'Zooz
    * ある目的地に向かうドライバーの空席を同じ方向に行きたい人に提供。

### IoT

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
* ビットプロパティ 日本
    * 再生可能エネルギープラットフォームBTP

### 著作権管理

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
