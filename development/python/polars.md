---
layout: page
---

# Polars

https://github.com/pola-rs/polars

## Frame

* DataFrame
    * created by `read_csv`
    * can be converted to lazy mode
        ```python
        df.lazy()
        ```
* LazyFrame
    * created by `scan_csv`
    * `describe_optimized_plan` method returns optimized plan.
    * call `collect` method to evaluates the output
    * call `fetch` method to evaluate the output for testing. It uses just a part of the data, not whole.
        * `fetch` can accept one parameter that represents the number of the records.
            ```python
            df.fetch(3)
            ```
    * `pivot` method is not available in this mode, for example. call `collect()` for it.


## Streaming mode

In streaming mode, the program processes the data step by step, instead of all at once. This allows the program to avoid the need for holding the entire dataset in memory, and it only requires memory for the specific part of the data it is currently handling.

The `collect` and `fetch` functions can be used with the `streaming` argument.

```python
df.collect(streaming=True)
df.fetch(streaming=True)
```

It's important to note that streaming mode might not be available for all operations, but it is supported for most of them.