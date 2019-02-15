---
layout: page
---

# Ethereum Web3 and EthereumJS-TestRPC

```node
const Web3 = require("web3")
const TestRpc = require("ethereumjs-testrpc")
var web3 = new Web3()
web3.setProvider(TestRpc.provider())
```
