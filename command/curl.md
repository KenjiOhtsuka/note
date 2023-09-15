---
layout: page
title: cURL command
---

## option

| option                                     | description                                                        |
|:-------------------------------------------|:-------------------------------------------------------------------|
| -X, --request _command_                    | HTTPメソッドを指定する                                                      |
| -H, --header _header_or_file__             | リクエストヘッダを指定する。<br />値のないヘッダを送る場合は、 "Header-Key;" のように最後にセミコロンをつける。 |
| -d                                         | リクエストボディを指定する                                                      |
| -i, --include                              | レスポンスヘッダも表示する                                                      |
| -I, --head                                 | レスポンスヘッダのみを表示する                                                    |
| -v, --verbose                              | リクエストとレスポンスの詳細を表示する                                                |
| -o, --output _filename_                    | レスポンスボディをファイルに保存する                                                 |
| -O, --remote-name                          | レスポンスボディをURLにあるファイルで保存する                                           |
| -u, --user _user_:_password_               | Basic認証を指定する                                                       |
| -k, --insecure                             | SSL証明書の検証を行わない                                                     |
| -s, --silent                               | 進捗状況、エラーメッセージを表示しない                                                |
| -S, --show-error                           | エラー時にエラーメッセージを表示する(`-s`, `--silent`指定時)                            |
| -L, --location                             | リダイレクトを許可する。 cURLはリダイレクト先に対してリクエストを実行する。                           |
| -c, --cookie-jar _filename_                | クッキーを書き込むファイルを指定する。 cURLはリクエスト実行後にメモリ内のクッキーをファイルに書き込む              |
| -b, --cookie _data_or_filename__           | 送信するクッキーを指定する。                                                     |
| -e, --referer _URL_                        | リファラを指定する                                                          |
| -A, --user-agent _name_                    | ユーザエージェントを指定する                                                     |
| -x, --proxy _\[protocol://\]host\[:port\]_ | プロキシを指定する                                                          |
| -4, --ipv4                                 | IPv4を強制する                                                          |
| -6, --ipv6                                 | IPv6を強制する                                                          |
| -h                                         | ヘルプを表示する                                                           |
| -D -                                       | レスポンスヘッダを標準出力に表示する                                                 |
| -D _filename_                              | レスポンスボディを標準出力に表示する                                                 |
| -V, --version                              | バージョンを表示する                                                         |
