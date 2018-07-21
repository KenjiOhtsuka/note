## Message Type

| type | |
|--:|:--|
| 0 | echo reply |
| 3 | destination unreachable |
| 4 | source quench |
| 5 | redirect |
| 8 | echo request |
| 11 | time exceeded |
| 12 | parameter problem |
| 13 | timestamp request |
| 14 | timestamp reply |
| 15 | information request |
| 16 | information reply |
| 17 | address mask request |
| 18 | address mask reply |

## Datagram

<table>
  <thead>
    <tr>
      <th>0-7</th><th>8-15</th><th>16-23</th><th>24-31</th>
    </tr>
  </thead>
  <tbody>
    <tr><td>Type</td><td>Code</td><td colspan="2">Checksum</td></tr>
    <tr><td colspan="4">Data (variable length)</td></tr>
  </tbody>
</table>
