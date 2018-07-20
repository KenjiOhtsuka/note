## Security

### Condition-Effects-Interaction pattern

* コントラクトから、他のコントラクトにメッセージを送信する場合の方式。
* 関数実行を3つのフェーズに分ける。

1. Condition
    * 条件のチェック。 条件が満たされていなければ処理終了。
1. Effects
    * ステートの更新。
1. Interaction
    * 他のコントラクトにメッセージを送信する。

### Withdraw pattern (push vi pull)

### Access Restriction pattern

### Mortal pattern

* コントラクトを削除できるようにしておく。
* 問題があった場合などに、削除できるので、被害を抑えることができる。
* もし削除できない、誤ったコントラクトがデプロイされた場合は、問題を止める手段がない。

### Circuit Breaker pattern

## Vulnerability

### Reentrancy problem

### Transaction-Ordering Dependence (TDD)

### Timestamp Dependence

ブロックのタイムスタンプに依存した処理による脆弱性

`block.timestamp` には、 トランザクションが発行されたときのUnixtimeではなく、マイナーがブロックを生成するときの値が設定される。
 => どんな値になるかはマイナーに依存する。
 
`block.timestamp` から当選番号を計算するようなことをすると、
マイナーが、自分自身を当選しやすいようにマイニングするという不公平な抽選が行われることになりかねない。

