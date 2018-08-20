---
layout: page
---

# ffmpeg

## Command

### Option

* audio bit rate [kbps]
    ```
    -ar 128
    ```
    * 低いサンプルレートの場合、大きい値は設定できない、
        * 32khz未満の場合は160kbps以上の値は設定不可。
* audio sampling rate [hz]
    ```
    -ar 16000
    ```
    