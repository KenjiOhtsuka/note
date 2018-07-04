# Geth

## ネットワークにつなぐ

```
geth --datadir "/directory/path" --networkid 1
```

* datadir
    * blockchain の保存先。 指定されなければ $HOME/.ethereum が使われる。 コマンド実行直後に画面に表示される。
    Windows の場合は `C:\Users\USERNAME\AppData` の中が使われます。
* networkid  

    | id | name |
    |--:|:--|
    | 1 | Mainnet |
    | 2 | Testnet |


## プライベートネットワークを作る

方法は2通り

* network id にランダムな値を指定する。
* `--dev` オプション をつける。

## アカウントの操作

### 作成

```
geth account new
```

パスワードの入力が求められる。 忘れると二度とアクセスできない。

### 一覧表示

```
geth account list
```

キーは `--datadir` で指定された場所に保存される。 `--keystore` の指定があればそちらが優先される。

### マイニング

`--mine` オプションを付けることでマイニング可能。

```
geth --mine --minerthreads 2 --minergpus '0,1,2' --etherbase 'XXXXXXXXX' --unlock 'XXXXXXXX'
```

#### minerthreads

ハッシュ生成に使うスレッドの数。 デフォルトで 8。

#### minergpus

マイニングに使用するGPUを指定する。
GPU のリストを取得するには geth gpuinfo コマンドを使用する。
各GPUを使用するには 1, 2 GB の RAM が必要らしい。
デフォルトではGPUを使用しない。

#### etherbase

マイニングによる成果報酬が入るアドレス。

#### unlock

(調査中)


* `--rpccorsdomain "*"`
    * allow certain domains to communicate with geth. `"*"` allows all domains.
* `--rpcaddr "0.0.0.0"`
    * indicates to which IP address the geth server is reachable. above example, it can be acccessed as "0.0.0.0".
