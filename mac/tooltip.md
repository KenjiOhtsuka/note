---
layout: page
---

# Tooltip

## Add folder to finder sidebar

1. Select the folder in the finder window.
1. Menu [File] -> [Add to Sidebar] (Or, control + command + t)


## File Info

```sh
afinfo file_path
```

shows file information.

* Example
    * audio sound file
        ```
        KenjinoMacBook-puro% afinfo mission_impossible_16_24000.mp3
        File:           file.mp3
        File type ID:   MPG3
        Num Tracks:     1
        ----
        Data format:     1 ch,  16000 Hz, '.mp3' (0x00000000) 0 bits/channel, 0 bytes/packet, 576 frames/packet, 0 bytes/frame
                        no channel layout.
        estimated duration: 211.500000 sec
        audio bytes: 423000
        audio packets: 5875
        bit rate: 16000 bits per second
        packet size upper bound: 728
        maximum packet size: 72
        audio data file offset: 0
        optimized
        ----
        ```
        
## Print automatically

mac で一括で印刷するためにつかったコマンド。

```
find . ./ | xargs lpr -o PageSize=A4 -o sides=two-sided-long-edge -o number-up=2
```

### Basic 

To print:

```
lpr $file_path -o PageSize=A4 -o sides=two-sided-long-edge -o number-up=2
```
