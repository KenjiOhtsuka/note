---
layout: post
title: Reinstall pre-installed apps in XPERIA
category: smartphone
tags: xperia
---

Have you ever erased necessary applications of your smart phones?
I'll introduce how did I reinstalled Talk.app, one of the pre-installed applications, into my XPERIA IS11S.

The beginning of this story is an annoying alarm of small remain disk space.
And I deleted Talk, but I awared it is really important,
because gmail's alert had become not to work and gmail account synchronization had become not to work.

The simple solution is to get and reinstall the application.
But I couldn't find Talk.apk.

## Solution

Here's my solution.
I used SManager with root.
First, launch a shell with SManager. Let's search Talk.apk. Type "cd /", "find -name Talk.apk". In my case, Talk.apk is in /system/app.


Go to `/system/app`. Type `cd /system/app`.
And next, `pm install -r Talk.apk`
If you can see "Success" message, input command ctrl+z and type `reboot`.

After rebooting, you can use the application as before erasing.
