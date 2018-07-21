# Network Management Protocol

## OSI Network Management Function

| name | example item |
|:--|:--|
| 構成管理 | システム構成要素の接続関係、構成変更、起動・終了 |
| 障害管理 | 動作状態監視、障害検出、障害回復 |
| 性能管理 | 遅延時間、機器・回線使用率、トラフィック等データ収集 |
| 機密管理 | 利用者ID管理、セキュリティ保護、認証 |
| 会計管理 | 利用データ収集、使用料金情報管理 |

OSIのアプリケーション層プロトコル CMIP (Common Management Information Protocol: 共通管理情報プロトコル) があるが、
かなり複雑であるため、 TCP/IP Suite ではネットワーク管理のプロトコルとして、 CMIP の設計思想を受け継いだ SNMP (Simple Network Management Protocol) を使っている。

## SNMP

UDP を使用する。

| comamnd | description |
|:--|:--|
| get-request | マネージャがエージェントに対して管理に必要なデータを送信するよう要求する。 要求したデータは MIB から読み出す。 |
| get-next-request | 1つのエージェントから連続して管理用データを取り出すときに使う。 |
| get-response | マネージャからの要求に応じて、エージェントからの応答データをマネージャに送る。 |
| set-request | マネージャが管理上の必要性に応じてエージェントのデータ(MIB の変数)を設定する。 |
| trap | エージェントの状態の変化や異常の発生をマネージャに知らせる。 |

### MIB

Management Information Base というデータベース。 エージェントの内部データを保管しておく。

