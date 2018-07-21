# Protocols for file transferring

* FTP: File Transfer Protocol
* TFTP: Trivial File Transfer Protocol
* NFS: Network File System

## FTP

TCP コネクションを利用する。

### Command

FTP を実行するソフトウェアに実装するもので、 クライアントのコマンドとは別。

| command | description |
|:--|:--|
| USER | Login user id |
| PASS | user password |
| QUIT | Logout |
| PORT | Port to be used |
| STOR | Send file |
| DELE | Delete file |
| RMD | Remove directory |
| MKD | Create directory |

### Reply code
#### First digit

| digit | description |
|:--|:--|
| 1 | 肯定的予備的応答 |
| 2 | 肯定的完了的応答 |
| 3 | 肯定的中間的応答 |
| 4 | 過渡的否定的完了応答 |
| 5 | 恒久的否定的完了応答|
  
#### Second digit

| digit | description |
|:--|:--|
| 0 | 構文誤り |
| 1 | 情報メッセージ |
| 2 | コネクションメッセージ |
| 3 | 認証及びアカウンティングメッセージ |
| 4 | 現在未使用 |
| 5 | ファイルシステムメッセージ |

| code | description |
|--:|--:|
| 125 | データコネクションオープン済、トランスファー開始 |
| 150 | ファイル状態OK、コネクションほぼオープン |
| 200 | コマンドOK |
| 211 | システム状態 |
| 213 | ファイル状態 |
| 220 | サービス準備完了 |
| 225 | データコネクションオープン |
| 226 | データコネクションクローズ |
| 231 | ユーザネームOK、要パスワード |
| 421 | サービス利用できず、制御コネクションクローズ |
| 500 | 構文エラー、コマンド解釈できず |
| 502 | コマンド未実装 |
| 550 | 要求されたアクション実行不能 |

## TFTP

UDP を使用する。
