## elementary type

### conversion

* `uint8` => `uint16`
* `int128` => `int256`

## Exception

```
contract Sample {
    function sampleFunction() {
        throw;
    }
}
```

## Visibility

| modifier | description |
|:--:|:--|
| external | Accessible only from external |
| public | Accessible from everywhere |
| internal | Accessible only from inside |
| private | Accessible from own contract or child contract |

## Contract Code

### Reserved words

| word | description |
|:--|:--|
| msg.sender | Address which called the function. |
| msg.value | Sending value in wei when the function is called for sending token. |
| this | The contract address. |
| this.balance | Balance of this contract. |
| address.balance | Balance of the address in wei. |
| modifier | |
| throw | throw exception. When an exception is thrown, all ether that equals to gas limit will be consumed. |
| event | |

### reserved functions

| signature | parameter | description |
|:--|:--|:--|
| falback (function) | (none) | function which receives no argument, is called when the function specified in transaction or message doesn't exist in the contract, and ether send transaction is called. |
| payable | address| This must be added to the functions which send ether. |
| selfdestruct / suicide | Discard the contract and send all ether in the contract to the passed address. |
| require | condition (true or false) | if the condition is evaluated as false, throw exception and abort the procedure. |
