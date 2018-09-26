---
layout: page
---

# ffmpeg

## Command

### Filter

* List available filters
    ```sh
    ffmpeg -filters
    ```

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
    -acodec pcm_s24le
    -acodec pcm_16le
    -acodec pcm_u8
    ```
    * 24 bit: `-acodec pcm_s24le`
    * 16 bit: `-acodec pcm_16le`
        * signed int little endian
    * 8 bit: `-acodec pcm_u8`
        * unsigned int
    * list acodec
        ```sh
        ffmpeg -codecs
        ```


## Example

* Change sound to stereo 96 khz and 24 bit wav
    ```sh
    ffmpeg -i before.mp3 -ar 96000 -ac 2 -acodec pcm_s24le after.wav
    ```
    * 音の高さを変えずにスピード変更
* Reduce speed
    ```sh
    ffmpeg -i ./input.mp3 -filter:a "atempo:0.5" -vn ./output.mp3
    ```
    * 音の高さを変えずにスピード変更
* Increase speed
    ```sh
    ffmpeg -i ./input.mp3 -filter:a "atempo:2.0" -vn ./output.mp3
    ```
* Higher pitch (assuming your audio is 44.1KHz)
    ```sh
    ffmpeg -i ./input.mp3 -filter:a "asetrate=r=48K" -vn ./output.mp3
    ```
* Lower pitch (assuming your audio is 44.1KHz)
    ```sh
    ffmpeg -i ./input.mp3 -filter:a "asetrate=r=36K" -vn ./output.mp3
    ```


    
## 参考

* CD は 44.1 khz 16 bit

* [英語などの語学用に倍速再生など再生速度を変えたファイルを一瞬で作成する方法](https://webnetforce.net/ffmpeg-audio-file-speed/)
* [サンプリング周波数を変えずにテンポとピッチを変える](http://nico-lab.net/rubberband_with_ffmpeg/)
* [How To Do Noise Reduction Using ffmpeg And sox](http://www.zoharbabin.com/how-to-do-noise-reduction-using-ffmpeg-and-sox/)
