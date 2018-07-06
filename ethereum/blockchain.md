## Transaction

* nonce
* to
* value
* data
* gasprice
* startgas: maximum gas consumable
* v, r, s: ECDSA signature values

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

## Account

referenced by address (20 bytes)

* nonce
* balance
* code hash
* storage trie root
