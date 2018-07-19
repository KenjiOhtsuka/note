## Security

### Condition-Effects-Interaction pattern

### Withdraw pattern (push vi pull)

### Access Restriction pattern

### Mortal pattern

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

