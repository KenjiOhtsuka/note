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


## Reference

* [SoXチートシート - コマンドラインで音声編集](https://qiita.com/moutend/items/50df1706db53cc07f105)