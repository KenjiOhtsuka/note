---
layout: page
---

いつかのなにかのメモがあったので一応載せておく。

<!-----
Copy and paste the converted output.

NEW: Check the "Suppress top comment" option to remove this info from the output.

Conversion time: 0.757 seconds.


Using this Markdown file:

1. Paste this output into your source file.
2. See the notes and action items below regarding this conversion run.
3. Check the rendered output (headings, lists, code blocks, tables) for proper
   formatting and use a linkchecker before you publish this page.

Conversion notes:

* Docs to Markdown version 1.0β26
* Mon Jun 08 2020 00:08:05 GMT-0700 (PDT)
* Source doc: NetworkFileSystem
----->




1. データの共有は分散システムにおいての基本である
    1. 分散ファイルシステムはマルチプロセスで長期間にわたり、安全にデータを共有できるようになっている。
    2. 構成
        1. 多くは昔ながらのクラサバ構成
        1. 分散ファイルサーバも存在する（中央サーバがない）
            1. 中央サーバでのファイル共有
                1. Sun Microsystem の NFS(Network File System)はとても有名
                2. NFS を標準の構成例として扱う
                    1. NFSv3, NFSv4 に焦点を絞り、それらの違いについても説明する
                    2. 基本アイディア：Remote Access Model
                        1. どのサーバもサーバ自身のローカルファイルを標準的な方法で見せるようになっている。
                            1. ファイルの内部的な管理方法がどうであれ、標準化されたアクセス方法でファイルを扱うことができる。
                        2. NFSはファイルにアクセスするためのプロトコルとセット。（プロトコルも含めて標準化している）
                        3. 根底にあるのは Remote File Service
                            2. クライアントはリモートサーバで管理されているファイルに透過的にアクセスできる。
                            3. クライアントは実際のファイルの場所を知りません。（リモートファイルサーバのどの場所にファイルがあるかは知らない。場所を隠蔽している。）
                            4. クライアントは自身のローカルファイルにアクセスするのと似たような方法でリモートファイルにアクセスできる。
                                1. サーバがインターフェースを提供する。
                    3. 基本アイディア: Upload/Download Model
                        4. クライアントはリモートファイルをダウンロードした上で、ダウンロード後のファイルに変更を行い、リモートサーバへアップロードする。
                        5. FTPはこの仕組み。
        1. NFS
            1. クライアントはリモートファイルシステムに対して、クライアント自身のOSに実装されたシステムコールを使ってアクセスする。
                1. ただし、このシステムコールはVirtualFileSystem に対するインターフェースに変更される。
                    1. これは異なるファイルシステムにアクセスする際のデファクトスタンダードになっている。
                1. VFSレイヤを通った命令は、ローカルファイルにアクセスするものもあれば、リモートファイルにアクセスするものもある。
                    1. VFSレイヤを通った命令はLocal file system interface または NFS client を通ることになる。VFSレイヤを挟むことで、リモートファイル、ローカルファイルへのアクセス方法を共通化している。
                1. すべてのクライアントサーバ間の通信はRPCで行われる。
            1. NFSサーバはクライアントの要求に答える。
                1. RPC stub はリクエストを整理してNFSサーバが標準的なVFSファイル操作に変換する。そしてリクエストは
                1. local file system がどうであれ気にしない。
        1. File System Model
            1. NFS の FileSystemModel
                1. Unixベースのものとほぼ同じ。
                1. ハードリンクをサポート
                1. ファイル名が存在するが、Unixのようなアクセス方法でもアクセス可能
                    1. ネームサービス内でファイル名を検索したのちにアクセスハンドラを得る
                1. NFSv3->NFSv4
                    1. 4まではステートレスとして扱っていた。
            1. remove
                1. v4: どんなファイルでも削除する。ディレクトリ含む。
                1. v3以前: ディレクトリ削除には rmdirが必要
            1. file open/close
                1. v4: クライアントにファイルの開閉を許可している。
                    1. 存在しないファイルを開くと、ブランクファイルが自動的に作成される。
                    1. closeするとクライアントがサーバにメッセージを送り、サーバは保持していたファイルの状態を開放する。
                1. v3以前: クライアントは直接ファイルを開閉できない。 
