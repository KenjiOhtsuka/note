---
layout: page
---

## Address Class

<table>
  <thead>
    <tr>
      <th>Class</th>
      <th>1</th>
      <th>2</th>
      <th>3</th>
      <th>4</th>
      <th>5</th>
      <th>6-8</th>
      <th>9-16</th>
      <th>17-24</th>
      <th>25-32</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>A</th>
      <td>0</td>
      <td colspan="5">Network ID</td>
      <td colspan="3">Host ID</td>
    </tr>
    <tr>
      <th>B</th>
      <td>1</td>
      <td>0</td>
      <td colspan="5">Network ID</td>
      <td colspan="2">Host ID</td>
    </tr>
    <tr>
      <th>C</th>
      <td>1</td>
      <td>1</td>
      <td>0</td>
      <td colspan="5">Network Id</td>
      <td>Host ID</td>
    </tr>
    <tr>
      <th>D</th>
      <td>1</td>
      <td>1</td>
      <td>1</td>
      <td>0</td>
      <td colspan="5">Multicast Address</td>
    </tr>
    <tr>
      <th>E</th>
      <td>1</td>
      <td>1</td>
      <td>1</td>
      <td>1</td>
      <td>0</td>
      <td colspan="4">Reserved</td>
    </tr>
  </tbody>
</table>

Class E is reserved for <abbr title="Internet Activities Board">IAB<abbr>, so we can not use.
  
### Network ID

ID that represents local network.

### Host ID

ID that represents one host.

## Number of addresses

| Class | Network | Host |
|:-:|--:|--:|
| A | 126 |16,777,214 |
| B | 16,382 | 65,534 |
| C | 2,097,150 | 254 |

## Address Meaning

| Network ID | Host ID | |
|:-:|:-:|:--|
| 0 | 0 | Used when emitting host doesn't know own address for bootstrap, etc. Special use. |
| 0 | Host Number | Network |
| Network Number | 1 for all | Broadcast for the network |
| 127 | Whatever | For loopback test |
