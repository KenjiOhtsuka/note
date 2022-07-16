---
title: OAuth
---


* Access Token
    * Bearer token in Authorization header

* Refresh token

## OAuth grant types

OAuth Grant Type によって OAuth のプロセスの順序が決まる。


| Grant type | User resoruces | Resource owner | app | note |
|:--|:--|:--|:--|:--|
| Client Credentials | NO | partner  | System-to-System | トークンエンドポイントにトークンリクエストを行う |
| Resource Owner Password | YES | user | trusted | |
| Authorization Code | YES | user | not trusted | |
| Implicit | YES | |  | NOT RECOMMENDED. |

各パターンでは、トークン生成のステップが異なる。

多く使われているのは Authorization Code.
特に、 OAuth をさらに標準化した OpenID Connect がよく使われる。

Aithorization Code の方式において、アクセストークンとユーザデータについてはブラウザ経由で送信されず、バックグラウンドでサーバ同士が通信を行う。

### Authorization Code

1. 認可リクエスト
    * 必須パラメータ
        * client_id
            * クライアントアプリケーションの識別子
        * redirect_url
            * 認証コードをアプリケーションに送信するときに、ユーザのブラウザをリダイレクトする先のURL。 コールバックURL, コールバックエンドポイントとも呼ばれる。
            * 多くの OAuth の攻撃はこの値を悪用する。
        * response_type
            * アプリケーションが期待する応答の種類と、開始するフロー。 Authorization Code の場合、値は code となる。
        * scope
            * クライアントアプリケーションがアクセスするユーザデータのサブセット。
            * IdP が設定したカスタムスコープ もしくは OpenID Connect で定義されたスコープ にする。
        * state
            * クライアントアプリケーション上の現在のセッションに関連付けられている一意で推測できない値。
            * OAuth サーバ はこの値を認証コードとともに返す。
            * エンドポイントへの要求が OAuth フローを開始したのと同じユーザであることのチェックに用いる。
2. ユーザのログイン＆同意
3. 認可コード送信
    * ブラウザを認可リクエストで指定した redirect_url へリダイレクトさせる。
    * このとき、 code (認可コード) と state を GET パラメータ として付与する。 state は送らない場合もある。
4. アクセストークンリクエスト
    * クライアントアプリケーションは認可コード(Authorization Code)を取得したらトークンのリクエストを行う。
    * ここから先のリクエストはブラウザを介さず行われる。
    * パラメータ
        * client_id
            * クライアントアプリケーションの識別子。
        * client_secret
            * クライアントアプリケーションに発行されたシークレット。
        * redirect_uri
        * grant_type
            * authorization_code とする。
        * code
5. アクセストークンレスポンス
6. API Call
    * アクセストークンは `Authorization: Bearer xxxxxx` のような形でヘッダに含められる。
7. Resource Grant
    * トークンが有効でクライアントアプリケーションに属していることを確認する。問題なければレスポンスを返却する。

### Implicit

Implicit は Authorization Code よりも簡略化されたフローになる。

認可リクエストを行った後、認可コードではなくアクセストークンを返す。 この処理はブラウザのリダイレクトを使用して行われるため安全性が低い。

1. 認可リクエスト
    * パラメータは Authorization Code と同じ。 ただし `responce_type=token` とする。
2. ユーザのログイン＆同意
3. アクセストークンの付与
    * パラメータ
        * access_token
        * token_type
        * expires_in
        * scope
        * state
4. API呼び出し
5. Resource Grant
    * トークンが有効でクライアントアプリケーションに属していることを確認する。問題なければレスポンスを返却する。


### Client Credential

サーバ同士の認証に用いられる。
Google Maps API で使われており、ユーザ固有のデータは使わない。

リフレッシュトークンは存在しない。

最初からクライアントアプリケーションはトークンリクエスト(POST)を送信する。

Authorization: Basic xxxxx
grant_type = `client_credentials`

### OpenID Connect

#### Scope

OpenID Connect では、決まったスコープを使用する。

* profie
* email
* address
* phone

##### ID Token

JWS で署名された JWT を返す。

* JWTペイロード
    * 最初に要求されたスコープに基づく要求の一覧が含まれている。
    * ユーザが OAuth によって最後に認証された方法と時期に関する情報も含まれる。
* JWTを用いると、クライアントアプリケーションとOAuthの間での送受信数が減る。


## RFC6750 Bearer token usage

認可サーバによって発行された token をリソースサーバに渡すための方法を定めている。

3通りある。

* Authorization header に埋め込む方法
* request body に埋め込む方法
* query parameter として渡す方法