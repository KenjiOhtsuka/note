---
title:  "Tomcat HTTPS redirect configuration"
date:   2019-07-31 10:52:48 +0900
categories: tomcat java server ec2
---


AWS EC2 で Tomcat の設定。
HTTP でアクセスが来た時に、HTTPSにリダイレクトする。

昔海外のサイトで見て設定していたもの


```xml
<Connector port="8080" protocol="HTTP/1.1"
           proxyPort="443" scheme="https" secure="true"
           proxyName="improve-future.com"
           connectionTimeout="20000"
           redirectPort="8443" />
```
