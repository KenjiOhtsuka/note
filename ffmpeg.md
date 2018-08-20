---
layout: page
---

# ffmpeg

## Command

### Option

* audio bit rate [Kbps]
    ```
    -ab 128
    ```
    * 低いサンプルレートの場合、大きい値は設定できない、
        * 32khz未満の場合は160kbps以上の値は設定不可。
* audio sampling rate [hz]
    ```
    -ar 16000
    ```
* the number of channels
    ```sh
    -ac 2
    ```
    * 1: monoral
    * 2: stereo
* sampling bit (audio codec)
    ```
    -acodec pcm_16le
    -acodec pcm_u8
    ```
    * 16 bit: `-acodec_16le`
        * signed int little endian
    * 8 bit: `-acodec_u8`
        * unsigned int

## Example

* Change sound to stereo 96 khz and 24 bit wav
    ```sh
    ffmpeg -i before.mp3 -ar 96000 -ac 2 after.wav
    ```
    
## 参考

* CD は 44.1 khz 16 bit