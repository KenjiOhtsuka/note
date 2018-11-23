---
layout: page
---

# Geth

## Connect to Network

```
geth --datadir "/directory/path" --networkid 1
```

* `--datadir`
    * blockchain の保存先。 指定されなければ $HOME/.ethereum が使われる。 コマンド実行直後に画面に表示される。
    Windows の場合は `C:\Users\USERNAME\AppData` の中が使われます。
* `--networkid`

    | id | name |
    |--:|:--|
    | 1 | Mainnet |
    | 2 | Testnet |


## Create private network

方法は2通り

* network id にランダムな値を指定する。
* `--dev` オプション をつける。

## Manage Account

[Geth Wiki](https://github.com/ethereum/go-ethereum/wiki/Managing-your-accounts)


### Create

```
geth account new
```

パスワードの入力が求められる。 忘れると二度とアクセスできない。

### List

```
geth account list
```

キーは `--datadir` で指定された場所に保存される。 `--keystore` の指定があればそちらが優先される。

### Mining

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


## Geth Console

### Open Geth Console

```
geth attach /tmp/geth.ipc
```

While geth app is running.

### Get Genesis Block

```
eth.getBlock(0)
```

#### Output Example

```js
{
  difficulty: 1,
  extraData: "0x0000000000000000000000000000000000000000000000000000000000000000a957fcd806ea7ae65e067a8ac74780c05ca06b44000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000",
  gasLimit: 6283185,
  gasUsed: 0,
  hash: "0x72d70653618de2d2ad5eb3e48bab2c65b23ac22ad590b432eab666176b1f3677",
  logsBloom: "0x000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000",
  miner: "0x0000000000000000000000000000000000000000",
  mixHash: "0x0000000000000000000000000000000000000000000000000000000000000000",
  nonce: "0x0000000000000000",
  number: 0,
  parentHash: "0x0000000000000000000000000000000000000000000000000000000000000000",
  receiptsRoot: "0x56e81f171bcc55a6ff8345e692c0f86e5b48e01b996cadc001622fb5e363b421",
  sha3Uncles: "0x1dcc4de8dec75d7aab85b567b6ccd41ad312451b948a7413f0a142fd40d49347",
  size: 622,
  stateRoot: "0xa9e6f764982046a0f43832f3989d8d8f1e9b4b94f1c2a43a40ecacf63a4ca40f",
  timestamp: 0,
  totalDifficulty: 1,
  transactions: [],
  transactionsRoot: "0x56e81f171bcc55a6ff8345e692c0f86e5b48e01b996cadc001622fb5e363b421",
  uncles: []
}
```

## Initialize blockchain by genesis file

```sh
 geth --datadir directory/path init genesisFile.json
```

## Open geth console

```sh
geth --networkid "15" --nodiscover --datadir ./ console 2>> geth_err.log
```

* `--datadir`
    * it must be the same directory of the one which is used for genesis block initialization.
* `--networkid`
    * it must be the same value as genesis block chainid.
* `--nodiscover`
    * stop discovering ethereum network node
    * geth will start discovering node of the same network id as default.
* `console`
    * launch console


```cmd
geth --dev --rpc --rpccorsdomain "*" --rpcaddr "0.0.0.0" --rpcport "8545" --mine --unlock=0
```

```cmd
geth --networkid "10" --nodiscover --datadir "/home/test_u/eth_private_net" --mine --unlock 0xa7653f153f9ead98dc3be08abfc5314f596f97c6 --rpc --rpcaddr "192.168.5.6" --rpcport "8545" --rpccorsdomain "*" console 2>> /home/test_u/eth_private_net/geth_err.log
```

```cmd
geth --dev --networkid 11 --nodiscover --datadir .\ --mine --rpc --rpcaddr 0.0.0.0 --rpcport "8545" --rpccorsdomain "*" console 2>> geth_log.log
geth --dev --networkid 11 --nodiscover --datadir .\ --mine --rpc --rpcaddr 0.0.0.0 --rpcport 8545 --rpccorsdomain "*" --rpcapi="db,eth,net,web3,personal,web3" console 2>> geth_log.log
```

### Launch EthereumWallet and connect to the running geth

```cmd
"C:\Program Files\Ethereum-Wallet\Ethereum Wallet.exe" --rpc http://localhost:8545
```

## Console

### Unit conversion

```js
web3.fromWei(10000, "ether")
```

### Account

#### Create Account

```js
personal.newAccount("password")
// 0x...
```

#### List Account

```js
eth.accounts
// address string Array
// => ['0xXXXXXX...', '0xYYYYYY...']
```

#### Unlock Account

```js
personal.unlockAccount(eth.accounts[1])
```

### Get Balance

```js
eth.getBalance('0xXXXXXX...')
```

### Transaction

#### Get Transaction

```js
var transaction = eth.getTransaction('0xXXXXXXXXXX...')```
```

`transaction` has the following attributes:

* `nonce`

#### Get Transaction Receipt (Consumed GAS)

```js
eth.getTransactionReceipt('0xXXXXXXX').gasUsed
```

#### send ETH

Before sending ethereum, the user must be unlocked.

```js
eth.sendTransaction({from: eth.accounts[0], to: eth.accounts[1], value: web3.toWei(3)})
```

#### call contract function

```js
// interface as object
var abi = [ { "constant": false, ... "type": "event"  }  ]]
var contractAbi = eth.contract(AbiOfContract);
var contract = contractAbi.at(contractAddress);
contract.functionName('xxx', 'yyy')

// Call function with parameter
contract.function_name.sendTransacton(param1, param2, {from: '0xXXXXXXX...'})

// example in stackoverflow
//var getData = contract.myFunction.getData(function parameters);
//web3.eth.sendTransaction({to:Contractaddress, from:Accountaddress, data: getData});
```
