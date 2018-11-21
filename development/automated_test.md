---
layout: page
---

シナリオテスト自動化

spook, geb, gradle, java8, thymeleaf, maven,

* spook
* groovy base
* easy understand assertion

日本語でよい

spook 自体が groovy base なので gradle を使う。
ちなみに、gradle のほうがreportがよい。

maven, gradle は共存可能。
gradle ではサブプロジェクトが使えるのでひとつのファイルでなんとかなる。
mavenはサブプロジェクトごとにpomファイルが必要。

gebはgradleをラップしたもの。
gebもdependenciesを追加するだけ。

chromedriverなどドライバ追加が必要。バイナリなので別途ダウンロードが必要。

waitfor ある要素が出現するまで待つ。

geb単体ではまだ難しい

最初のテストは失敗する。
lazyinitializeを使うと最初に初期化がたくさん行われるのでタイムアウトになる。

form入力の補助が必要
knockoutjs などを使う。

webdriverの初期化は1回しか行われない。

エラーが出てもキャプチャがないとわかりにくい
シナリオテストのかばれっじがとれる30シナリオで10分ほどかかる

重要度に応じて優先的にテストを書く
