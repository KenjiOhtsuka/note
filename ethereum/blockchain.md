## Transaction

* nonce
* to
* value
* data
* gasprice
* startgas: maximum gas consumable
* v, r, s: ECDSA signature values

### Examples

* send transaction
    ```
    {
      blockHash: "0x37343e0e2f0f83a62242de56f94d12dead6369484c863663cdd243f9f7795550",
      blockNumber: 5218,
      from: "0xdd879456715240c7adfebce77113cb463df3492b",
      gas: 90000,
      gasPrice: 18000000000,
      hash: "0xb1478d9c8b74c267b3c1997b9a709f0aa0470d0384d4b04b0f738486663d5ce1",
      input: "0x",
      nonce: 1,
      r: "0xde14efd10ef94d21fe5407d4a31a1ba136a0b4b75437e87bca8ca86178817b6f",
      s: "0x182bfb95ff4c41b1bf1ab6b295e3a80139d48b4246363f5e2ba71ae71b6429d7",
      to: "0x7228425bd84bf03fc1923e158b352315c9ccc1df",
      transactionIndex: 1,
      v: "0x1c",
      value: 2000000000000000000
    }
    ```
* creating contract transaction
    ```
    // eth.getTransaction(myContract.transactionHash)
    {
      blockHash: "0xcd5c8b1145fba07bbd5c705045b54c6a64d4ee1a38ec0f75f73b2a4fc696fe10",
      blockNumber: 5284,
      from: "0x7228425bd84bf03fc1923e158b352315c9ccc1df",
      gas: 90000,
      gasPrice: 18000000000,
      hash: "0x57daf74799b93d75c2f21a7c4a53391f2846b79a9ddc8800135636314dcf9022",
      input: "0x608060405234801561001057600080fd5b5060df8061001f6000396000f3006080604052600436106049576000357c0100000000000000000000000000000000000000000000000000000000900463ffffffff16806360fe47b114604e5780636d4ce63c146078575b600080fd5b348015605957600080fd5b5060766004803603810190808035906020019092919050505060a0565b005b348015608357600080fd5b50608a60aa565b6040518082815260200191505060405180910390f35b8060008190555050565b600080549050905600a165627a7a723058208d6279351bb1cdc311a9978f6f2dfdb5d07f870c18294eeb54a5d576dba0e4430029",
      nonce: 2,
      r: "0xb7792666f32fdfbf06a17a7abf4af3a2f1f7ccef2ca212deb70b23f0de86970",
      s: "0x4c1a847f503bc973bbc3935da6654815edf2170656f17f57cb3ec60715f13e1a",
      to: null,
      transactionIndex: 0,
      v: "0x1b",
      value: 0
    }
    ```


## Account

referenced by address (20 bytes)

* nonce
* balance
* code hash
* storage trie root
