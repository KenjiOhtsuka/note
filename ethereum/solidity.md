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
