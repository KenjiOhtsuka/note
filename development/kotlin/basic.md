---
layout: page
---

# 基本

## 数値の範囲

<table>
    <thead>
        <tr>
            <th>型</th>
            <th style="text-align:right;" colspan="2">最小値</th>
            <th style="text-align:right;" colspan="2">最大値</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th><code>Byte</code></th>
            <td style="text-align:right;">- 2 ^ 7</td>
            <td style="text-align:right;">- 128</td>
            <td style="text-align:right;">2 ^ 7 - 1</td>
            <td style="text-align:right;">127</td>
        </tr>
        <tr>
            <th><code>UByte</code></th>
            <td style="text-align:right;" colspan="2">0</td>
            <td style="text-align:right;">2 ^ 8 - 1</td>
            <td style="text-align:right;">255</td>
        </tr>
        <tr>
            <th><code>Short</code></th>
            <td style="text-align:right;">- 2 ^ 15 </td>
            <td style="text-align:right;">- 32768</td>
            <td style="text-align:right;">2 ^ 15 - 1</td>
            <td style="text-align:right;">32767</td>
        </tr>
        <tr>
            <th><code>UShort</code></th>
            <td style="text-align:right;" colspan="2">0</td>
            <td style="text-align:right;">2 ^ 16 - 1</td>
            <td style="text-align:right;">65535</td>
        </tr>
        <tr>
            <th><code>Int</code></th>
            <td style="text-align:right;">- 2 ^ 31</td>
            <td style="text-align:right;">- 2147483648</td>
            <td style="text-align:right;">2 ^ 31 - 1</td>            
            <td style="text-align:right;">2147483647</td>
        </tr>
        <tr>
            <th><code>UInt</code></th>
            <td style="text-align:right;" colspan="2">0</td>
            <td style="text-align:right;">2^32 - 1</td>
            <td style="text-align:right;">4294967295</td>
        </tr>
        <tr>
            <th><code>Long</code></th>
            <td style="text-align:right;">- 2 ^ 63</td>
            <td style="text-align:right;">-9223372036854775808</td>
            <td style="text-align:right;">2 ^ 63 - 1</td>
            <td style="text-align:right;">9223372036854775807</td>            
        </tr>
        <tr>
            <th><code>ULong</code></th>
            <td style="text-align:right;" colspan="2">0</td>
            <td style="text-align:right;">2 ^ 64 - 1</td>
            <td style="text-align:right;">18446744073709551615</td>
        </tr>
        <tr>
            <th><code>Float</code></th>
            <td style="text-align:right;" colspan="2">- 3.4028235 x 10 ^ 38</td>
            <td style="text-align:right;" colspan="2">3.4028235 x 10 ^ 38</td>
        </tr>
        <tr>
            <th><code>Double</code></th>
            <td style="text-align:right;" colspan="2">- 1.7976931348623157 x 10 ^ 308</td>
            <td style="text-align:right;" colspan="2">1.7976931348623157 x 10 ^ 308</td>
        </tr>
    </tbody>
</table>

## リストと配列の違い

Arrays and lists (represented by List<T> and its subtype MutableList<T>) have many differences, here are the most significant ones:

### データ構造

* Array
    * 連続した、決まったサイズのメモリ領域が確保される。
* List
    * ...
 
### できること・できないこと

| | Array | List | MutableList |
|:--|:--:|:--:|:--:|
| 後からの値変更 | O | X | O |
| 後からの要素追加・削除 | X | X | O |
