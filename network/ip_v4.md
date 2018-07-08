## Address Class

| class | 0 | 1 | 2 | 3 | 4 | 5 | 6 | 7 | 8 - 15 | 16 - 23 | 24 - 31 |
|:-:|:-:|:-:|:-:|:-:|:-:|:-:|:-:|:-:|:-:|:-:|:-:|
| A | 0 <td colspan="7">Network ID</td><td colspan="3">Host ID</td>
| B | 1 | 0 <td colspan="7">Network ID</td><td colspan="2">Host ID</td>
| C | 1 | 1 | 0 || |
| D | 1 | 1 | 1 | 0 | |
| E | 1 | 1 | 1 | 1 | 0 |

<table>
  <thead>
    <tr>
      <th>class</th>
      <th>0</th>
      <th>1</th>
      <th>2</th>
      <th>3</th>
      <th>4</th>
      <th>5</th>
      <th>6</th>
      <th>7</th>
      <th>8-15</th>
      <th>16-23</th>
      <th>24-31</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>A</th>
      <td>0</td>
      <td colspan="7">Network ID</td>
      <td colspan="3">Host ID</td>
    </tr>
    <tr>
      <th>B</th>
      <td>1</td>
      <td>0</td>
      <td colspan="7">Network ID</td>
      <td colspan="2">Host ID</td>
    </tr>
    <tr>
      <th>C</th>
      <td>1</td>
      <td>1</td>
      <td>0</td>
      <td colspan="7">Network Id</td>
      <td>Host ID</td>
    </tr>
    <tr>
      <th>D</th>
      <td>1</td>
      <td>1</td>
      <td>1</td>
      <td colspan="7">Multicast Address</td>
    </tr>
  </tbody>
</table>
