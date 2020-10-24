# Software engineering

## 業務分析の modeling methods

* 業務の全体を導いた後、詳細化を進める。
* 業務を細かい単位に分割して詳細化を進めた後、結合する
* リアルタイムな変化を示す微細なものを表す

## コンポーネントモデリング

全体から任意の部分をコンポーネントという単位で切り出して分析する。

### 分析の流れ

1. 業務フローの洗い出し (アクティビティ図)
  1. ロールの洗い出し
    * 動作主体。
    * ロールとアクターは異なる。
      * アクターは登場人物を特定して表すが、ロールでは複数の対象を表すことができる。（？）
  2. アクティビティの洗い出し
    * 「(〜を)〜する」という動詞をヒアリングから抽出
    * アクティビティは階層構造になる。 「〜する」のなかに「XXXする」「YYYする」というのが含まれることがあるので、ツリー構造にしてわかるようにするとよい。
2. システム境界の導出 (ユースケース図)
    * アクティビティ図の各スイムレーンからアクター・ロールを抽出する。
    * "アクター/ロール"というように表記すると良い。 ロールだけなら "/ロール" と表記する。
    * アクティビティのまとまりがユースケース
    * 複数のロールにまたがったアクティビティをひとつのユースケースにまとめてもよい
    * ユースケース図では、左側にあるアクターがユースケースを実行するアクター。 右側にあるのがユースケースに関連するアクター。（？）
3. コンポーネント分割 (コンポーネントのクラス図)
    * 業務をコンポーネントに分割する。
    * ユースケースで著された機能を実現するために必要なものを出す。
        | ユースケース | コンポーネント |
        |:--|:--|
        | XXをYYする | AA管理、BB管理 |
        | TTをSSする | CC管理、DD管理 |
    * 各コンポーネントの表を作る
        | コンポーネント名 | 説明 |
        |:--|:--|
        | XX管理 | AA, BBを行うコンポーネント |
        | YY管理 | CC, DDを行うコンポーネント |
4. コンポーネントのコラボレーション (コラボレーション図)
    * コンポーネントの相互関係を分析する
5. シナリオの作成 (シナリオ)
    * コンポーネントのインターフェースからシナリオを作る。
    * シナリオの構成
        * シナリオ名
        * シナリオ説明
        * アクター
        * 事前条件
        * ステップ
        * 事後条件
6. オブジェクトの導出 (オブジェクト図)
7. オブジェクトの抽象化 (クラス図)
8. コンポーンネントの仕様化 (コンポーネント仕様)
    * コンポーネント仕様はインターフェースと情報の両方を表現できる
    * パッケージ図を使用する。
        * パッケージ図内にはクラスを配置
        * インターフェースには <<interface type>> というステレオタイプをつける。
        * 情報モデルには <<info type>> というステレオタイプをつける。
        * パッケージには <<component>> とつける
    * 例
        * <<component>> XX管理コンポーネント
        * <<interface type>> XX管理
            * AAをYYする
            * BBをXXする
            * CCをZZする
        * <<info type>> 多くの場合クラスのようなデータモデルになる
            * 各属性をリスト化する
9. コンポーネントの相互作用 (シーケンス図)
    * コンポーネント間の動的な関係を表示する。
    * <<actor>>, <<component>> を並べて動きを表す。
  
## 参考文献 Reference

* [コンサルタントになる人のはじめての業務分析](https://www.amazon.co.jp/dp/4797324058/ref=as_li_ss_tl?ie=UTF8&linkCode=ll1&tag=kjot-22&linkId=c803ac4bb54763f0ce505fff789c03d3&language=ja_JP)
* [ユースケース実践ガイド―効果的なユースケースの書き方](https://www.amazon.co.jp/dp/4798101273/ref=as_li_ss_tl?ie=UTF8&linkCode=ll1&tag=kjot-22&linkId=061a1ec761a88260662ee9a46e2e75f3&language=ja_JP)
* [UML モデリングのエッセンス](https://www.amazon.co.jp/dp/4798107956/ref=as_li_ss_tl?ie=UTF8&linkCode=ll1&tag=kjot-22&linkId=870c6a74dfcc567e58f0c3f39cace55a&language=ja_JP)
* [UMLコンポーネント設計―コンポーネントベースソフトウェアのための開発プロセス](https://www.amazon.co.jp/dp/489471387X/ref=as_li_ss_tl?ie=UTF8&linkCode=ll1&tag=kjot-22&linkId=61c614f76f86e0733c36e5b977a9f63b&language=ja_JP)
* [UMLによる統一ソフトウェア開発プロセス―オブジェクト指向開発方法論](https://www.amazon.co.jp/dp/4881358367/ref=as_li_ss_tl?ie=UTF8&linkCode=ll1&tag=kjot-22&linkId=3ac3aa62f25e63fb38bd694cf43888b0&language=ja_JP)
* [ビジネスコンポーネントファクトリ](https://www.amazon.co.jp/dp/4798100935/ref=as_li_ss_tl?ie=UTF8&linkCode=ll1&tag=kjot-22&linkId=31597e917dac4299cda76f7899bf77dd&language=ja_JP)
* [アナリシスパターン―再利用可能なオブジェクトモデル](https://www.amazon.co.jp/dp/4894716933/ref=as_li_ss_tl?ie=UTF8&linkCode=ll1&tag=kjot-22&linkId=d9416826fccd9c152ebe00d94fd097df&language=ja_JP)
* [企業情報システムの一般モデル―UMLによるビジネス分析と情報システムの設計](https://www.amazon.co.jp/dp/4894714841/ref=as_li_ss_tl?ie=UTF8&linkCode=ll1&tag=kjot-22&linkId=c41bc98f4bd11366c67680870b959f7c&language=ja_JP)
* [アジャイルモデリング―XPと統一プロセスを補完するプラクティス](https://www.amazon.co.jp/dp/4798102636/ref=as_li_ss_tl?ie=UTF8&linkCode=ll1&tag=kjot-22&linkId=3686fe40e0dd420ba27bf68e58b06960&language=ja_JP)
