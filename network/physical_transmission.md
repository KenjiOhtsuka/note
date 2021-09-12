---
layout: page
title: Physical Transmission
---

* digital modulation
    * ビットとシグナルの変換

## Baseband transmission

### Manchester encoding : マンチェスター符号化

* クロック信号とデータ信号のXOR
* クロック
    * ビット周期の前半がハイ、後半がロー
* それぞれのビットに対して2回の信号変化が必要
    * bandwidth の利用が非効率

### NRZ : Non-Return-to-Zero 比ゼロ復帰

* 論理値が1の場合に送信し、論理値が0の時に送信しない
* 信号は最大2ビットごとに正と負のレベルの間を循環する可能性がある（1と0が交互になっている場合）。
    * ビットレートがBビット/秒の場合、少なくとも B / 2Hzの帯域幅が必要

### NRZI : NRZ Inverted

* USB で利用されている。
* 論理値0の送信時には信号レベルを変化させない、論理値1の送信時には前の状態を反転させる
* 論理値の変化を最小限にして、信号を複合する回路にクロック情報を提供する

