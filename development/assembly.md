---
layout: page
title: Assembly
---

## 汎用レジスタ H+L

* AX アキュムレータ (Accumlator)
* BX ベースレジスタ (Base)
* CX カウントレジスタ (Count)
* DX データレジスタ (Data)

## インデックスレジスタ

* SI ソースインデックス (Source Index)
* DI ディスティネーションインデックス (Destination Index)

## 特殊レジスタ

* BP ベースポインタ (Base Pointer)
* SP スタックポインタ (Stuck Pointer)
* IP インストラクションポインタ (Instruction Pointer)

## セグメントレジスタ

* CS コードセグメント (Code Segment)
* DS データセグメント (Data Segment)
* ES エクストラセグメント (Extra Segment)
* SS スタックセグメント (Stuck Segment)

## フラグレジスタ

セグメントアドレス  
オフセットアドレス

アドレスパスの本数は 20本。
セグメントベースから 64kb をセグメントと呼ぶ。

A [Address]
    アセンブリの記述

Q
    終了

G [= start address][end address]
    プログラム実行

T [= start address][end address]
  Execute program, print register

U [start address][end address]
  reverse addemble

D [start address][end address]
    memory dump

E address [code list]
    Insert code list, hexadecimals, into and after indicated address

Little endian
    One register is composed of 2 little endian

    AX = ABCD
      AH = AB  
      AL = CD

8086 processor
    Segment address + offset address
        15F2 : 0100
    Segment Base
        15F20

Code Segment
    Address of running program

Data Segment
    Referenced in transporting data between register and memory

Extra segment
    used like data segment

Stack segment
    used in stack operation

In MS-DOS, OS controlles segment address

OffsetAddress
    [0200] : Address of 200 offset

When you store value into memory,
you should indicate data size.
Because memory can adapt to 1 byte to 1 word,
while register size is defined by receiving register.

PTR operator
    usage
        BYTE PTR for 1 byte  
        WORD PTR for 2 byte  
        DWORD
    example
        ```
        MOV BYTE PTR ]0200], 41
        MOV WORD PTR ]0300], 43 42
        ```

for offset address use
    BX, BP, SI, DI

    example
        ```
        MOV BX, 0200
        MOV WORD PTR [BX], 4443
        MOV WORD PTR [BX+2], 4241
        ```

Arithmatic
    example
        ```
        MOV AX, 10 # AX = 10
        # 10 is hexadecimal value
        MOV DX, 20 # DX = 20
        # 20 is hexadecimal value
        ADD AX, DX # AX = AX + DX
        SUB DX, 5  # DX = DX - 5
        ```

Increment, Decrement
    ```
    MOV AX, 000F
    MOV WORD PTR [0200], 43, 42
      # 43 is saved into [0201]
      # 42 is saved into [0200]
    INC AX
    INC BYTE PTR ]0201]
    DEC BYTE PTR [0200]
    ```

    ```
    AX = 000F
    [0200] = ,
    AX += 1     -> AX = 0010
    [0201] += 1 -> [0201] = 44
    [0200] -= 1 -> [0201] = 41
    ```
