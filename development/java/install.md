---
layout: page
---

# Install Java

## Mac

```sh
brew tap caskroom/versions
# install latest version
brew cask install java
```

## Amazon Linux

### JDK 10.0.2

```sh
# ec2-user

wget https://download.java.net/java/GA/jdk10/10.0.2/19aef61b38124481863b1413dce1855f/13/openjdk-10.0.2_linux-x64_bin.tar.gz
sudo mv openjdk-10.0.2_linux-x64_bin.tar.gz  /var/lib/
   
# root

cd /var/lib/
mkdir java
mv openjdk-10.0.2_linux-x64_bin.tar.gz  java/
cd java/
tar xvfz openjdk-10.0.2_linux-x64_bin.tar.gz 
rm openjdk-10.0.2_linux-x64_bin.tar.gz 
update-alternatives --install /usr/bin/java java /var/lib/java/jdk-10.0.2/bin/java 1

# ec2-user (for AWS SES)

mkdir certification
cd certification/
openssl s_client -connect email-smtp.us-east-1.amazonaws.com:443 < /dev/null | sed -ne '/-BEGIN CERTIFICATE-/,/-END CERTIFICATE-/p' > email-smtp.us-east-1.amazonaws.com_public.crt
sudo /var/lib/java/jdk-10.0.2/bin/keytool -import -alias email-smtp.us-east-1.amazonaws.com -keystore /var/lib/java/jdk-10.0.2/lib/security/cacerts -file email-smtp.us-east-1.amazonaws.com_public.crt 
```

### Reference

* [MacのBrewでJava8 + Java10を利用する](https://qiita.com/seijikohara/items/56cc4ac83ef9d686fab2)
* [macOSにOpenJDKをインストールする](https://blog.webarata3.link/macos-openjdk)
