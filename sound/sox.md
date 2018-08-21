---
layout: page
---

# SOX

## Installation

### Mac

```sh
brew install lame
brew install sox
```

## Conversion

### Remove Noise

```
ffmpeg -i source.mp3 -vn -ss 00:00:18 -t 00:00:20 noisesample.wav
ffmpeg -i source.mp3 -vn -t 00:00:00.5 noisesample.wav
sox noisesample.wav -n noiseprof noise_profile_file
sox source.mp3 output.mp3 noisered noise_profile_file 0.31
```

Where noise_profile_file is the profile and 0.30 is the value.
Values goes best somewhere between 0.20 and 0.30,
over 0.3 is very agressive,
under 0.20 is kind of soft and works well for very noisy audios.

### Change Speed

* 音を保ったままスピード変更
    ```sh
    sox input.wav output.wav tempo 1.25
    ```
* 音を保ったまま綺麗にスピード変更
    ```sh
    sox input.wav output.wav stretch 2
    ```
    * 2倍の長さにする(0.5倍のテンポにする)場合には2を指定する。
* スピード変更、音もそれに合わせて変わる
    ```sh
    sox input.wav output.wav speed 1.25
    ```

## Mix

```sh
sox -m vocal.wav guitar.wav drums.wav output.wav
```


## Reference

* [SoXチートシート - コマンドラインで音声編集](https://qiita.com/moutend/items/50df1706db53cc07f105)