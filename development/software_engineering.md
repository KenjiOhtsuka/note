---
layout: post
---

# Software Engineering

## ソフトウェアエンジニアリングの目的

* ソフトウェアに基づくシステムを開発して、カスタマーのビジネスゴール達成に寄与すること。

* ソフトウェアエンジニアはカスタマーのビジネスニーズを理解して、ソフトウェアを設計する。
    * ソフトウェアエンジニアに求められる能力
        * 新しいそして多様なルール・ビジネスプロセスを素早く学習する能力。
        * ドメインエキスパートとのコミュニケーション能力。
            * 問題の抽象的なモデルを抽出して、カスタマーのビジネスコンテキストにおいて意味のあるソリューションを提供する。
        * 提案したソリューションを実現して、将来に渡って変化し続けるビジネスにあわせて変化できるソフトウェアを設計する能力。

### ソフトウェアエンジニアリングとプログラミングの違い

* ソフトウェアエンジニアリング
    * ビジネス上の問題を理解し、ソリューションを提示してその設計を行うこと。
    * あるべきシステムとユーザおよびその環境の相互作用の理解と、その理解に基づくシステム設計にフォーカスする。
* プログラミング (狭義のソフトウェアエンジニアリング)
    * デザインされたものを実装すること。
    * プログラムコードとそれが与えられたデザインにしたがって正しく動くかにフォーカスする。

ドキュメントの有無はソフトウェアエンジニアリングを助けるもので、
ドキュメントがなかったからといってソフトウェアエンジニアリングでないとはいえない。

### ソフトウェアエンジニアリングはなぜ難しいか

* ソフトウェアエンジニアリングで知っておくべきこと
    * ソフトウェア
        * 入力と出力が定義される、形式的な領域
    * 問題 (なんのためにソフトウェアを作るのか)
        * 問題によっては1年以上の調査期間が必要なものもある。
        * エキスパートからのヒアリングで理解することが多い領域
        * はっきりと定義されていないことが多い、非形式的な領域

### ウォーターフォールが難しい理由

ウォーターフォールのような、開発プロセスの順番が決まっている開発方式が難しい理由。

* ソフトウェアはモノではないし、可視化できない。
    * 人はソフトウェアを使い、入力と出力を確認することで理解する。
* ソフトウェアは非常に複雑。
    * 1bit の違いでも、結果が変わってくる。
    * 非常に多くのパーツが複合的に組み合わさっている。
* ソフトウェアは非常に柔軟。
    * 開発プロセスの途中でも、非常に簡単に変更できる。

### イテレーティブ/インクリメンタル 開発モデル

1. 大きな問題を小さい問題に分割して優先順位をつける。
2. 各イテレーションで開発を徐々に進めていく。
3. カスタマーのフィードバックを得ながら、開発の方向性を調整する。

## 要求分析

* 要求エンジニア(requirement engineer)/要求エンジニアリング(requirement engineering)の仕事
    * 意思決定者が一貫した要件を策定できるように、すべての利害関係者情報を分類する。
    * 最終的に**Requirement Spefcification Document**(要求仕様書)を作成する。

要求は機能要件と非機能要件の2種類に分けられる。

* Functional requirements (機能要件)
    * システムに期待する動作、問題領域においてシステムが出すアウトプット
    * 通常この要件がメインのプロダクトの機能となる。
* Non-functional requirements (非機能要件) 
    * システムの品質に関する性質。
    * 例: 停電の場合に備えてデータのバックアップを保持する。

### 非機能要件

* 機能要件と非機能要件は複雑に絡み合っていることが多く、完全に分離することは難しい。
    * 非機能要件を満たすには、システム自体の変更が必要になることが多い。パフォーマンスなど。
* 非機能要件も機能要件も顧客の満足度に強く影響する。

#### FURPS+

システムが備える非機能属性。

* Functionality
    * 考慮されているべき追加機能
    * security, which refers to ensuring data integrity and authorized access to information
* Usability
    * the ease of use
    * esthetics
    * consistency
    * documentation—a system that is difficult confusing to use will likely fail to accomplish its intended purpose
* Reliability
    * the expected frequency of system failure under certain operating conditions
    * recoverability
    * predictability
    * accuracy
    * mean time to failure (MTTF)
* Performance
    * the computing speed
    * efficiency
    * resource consumption
    * スループット throughput
    * レスポンス時間 response time
* Supportability
    * testability
    * adaptability
    * 保守性 maintainability
    * 互換性 compatibility
    * configurability
    * installability
    * スケーラビリティ scalability
    * localizability 
    
### 要件の優先順位づけ

* コストバリューアプローチで優先順位をつけることが多い。
    * 実装コスト + 予想される利益 を提示して、顧客に優先順位を決めてもらう。

たとえば次の4つに要求は分けられる。

1. Essential
    * have to be realized to make the system acceptable to the customer.
2. Desirable
    * highly desirable, but not mandatory requirements
3. Optional
    * might be realized if time and resources permit
4. Future
    * will not be realized in the current version of the system-to-be, but should be recorded for consideration in future versions 

### 受入テスト

User Acceptance Test (UAT) はカスタマーによって要求分析の際に作成される。

### 見積もり

ユーザストーリーのストーリーポイントで見積もる場合、
複数のユーザストーリーが相互に関係していると、見積もりが難しくなる。
そのような場合には、ユーザストーリーを合わせて一つにするか、さらに分割することで見積もりしやすくする。


### Use Case Modeling / ユースケースモデリング

ユースケースによるアプローチは、受動的な、相互に関係するシステムについて

* use case
    * ユーザがどのようにシステムを利用してビジネスゴールを達成するかを記述したもの。

#### 要素

* actor
    * 人物だけでなく、他のシステム、物理的物体もアクターになる。
    * システムの外部にあるもので、システムと相互に関係するもの。
    * actor は責務を持つ。
    * Initiating actor
        * use case の起点となるアクター。
    * Participationg actor
        * Supporting actor
            * ユースケースを実行するためにシステムをサポートするアクター。
        * Offstage actor
            * 受動的にユースケースに参加するアクター。
* responsibility / 責務
* goal

アクターは、ゴールを達成するために何らかのアクションを行う。

* action
    * システムとの相互作用のトリガーとなるもの。

#### Detailed Use Case

#### Use Case Points

ゴールまでに必要な時間を決める要素は3つある。

* Functional requirements
    * ユースケースとして表現される。
    * ユースケースの複雑さは、アクターの数と複雑さ、それぞれのユースケースで実行されるステップ数(トランザクション数)によって決まる。
* Non-functional requirements
    * FURPS+ として知られているものに加えて、 technical complexity factors がある。
* Environment factors
    * 開発チームの経験、知識、開発チームが使用するツール

20% の誤差までなら、 非常によく見積れていると言える。

ユースケースポイントは次の式で計算する。

    UCP = UUCP x TCF x ECF

* Unadjusted Use Case Points (UUCP)
    * 機能要件(functional requirement)の複雑さを計測したもの。
* Technical Complexity Factor (TCF)
    * 非機能要件(non-functional requirement)の複雑さを計測したもの。
* Environment Complexity Factor (ECF)
    * 開発チームの経験・環境を計測したもの。

##### UUCP

UUCP は次の式で計算する。

    UUCP = UAW + UUCW

* Unadjusted Actor Weight (UAW)
    * すべてのユースケースの、全てのアクターのウェイト合計。
* Unadjusted Use Case Weight (UUCW)
    * すべてのユースケースシナリオに含まれるアクティビティ数(またはステップ数)の合計。

###### Unadjusted Actor Weight (UAW)

ユースケースにおけるアクターの分類とウェイト。

| Actor Type | | Weight |
|:--|:--|:--|
| Simple | 別のシステム。 APIなど。 | 1 |
| Average | テキストベースのUIからシステムを利用する人間。 プロトコルを介してシステムにアクセスする他のシステム。 | 2 |
| Complex | GUIを通じてシステムに関与する人間。 | 3 |

###### Unadjusted Use Case Weight (UUCW)

トランザクション数に応じたユースケースのウェイト。

| Category | | Weight |
|:--|:--|:--|
| Simple | 単純なUI。 関連するアクターは1人まで。 シナリオのステップ数は3以下。 ドメインモデルの含むコンセプトが3以下。 | 5 |
| Average | 標準的なUI。 関連するアクターは2人以上。 シナリオのす鉄砲数は4-7。 ドメインモデルの含むコンセプトは5-10。| 10 |
| Complex | 複雑なUIまたは処理。 関連するアクターは3人以上。 シナリオのステップ数は 7以上。 ドメインモデルは10以上のコンセプトを含む。 | 15 |

##### TCF


### Traceability matrix

* PW (Priority Weibght)
* Max PW
* Total PW

### System Sequence Diagram

ユースケースシナリオを、シーケンス図で表す。





## アーキテクチャ

* ソフトウェアアーキテクチャの領域
    * 非機能要件
    * 機能要件の分解


## Robustness diagram

* [ロバストネス図を活用したシステム設計](https://thinkit.co.jp/article/13487)
