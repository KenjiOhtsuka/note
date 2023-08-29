---
layout: page
title: NodeJS
---

## Server (Hosting Service)

* Glitch
* Modulus
* CloudBees


## Path

* see global module path
    ```
    npm bin -g
    ```
* add global module path to PATH
    ```
    export PATH=`npm bin -g`:$PATH
    ```
* add local module path to PATH
    ```
    export PATH=`npm bin`:$PATH
    ```

## Set environmental variable

add the following code to `.zshrc`.

```
NODE_PATH=$(npm root -g)
```
