# Apache

## Stop Apache

```
sudo apachectl stop
```

```
sudo apachectl -k stop
```

## Start Apache

```
sudo apachectl start
```

```
sudo apachectl -k start
```

## Restart Apache

```
sudo apachectl restart
```

```
sudo apachectl -k restart
```

## Run a configuration file syntax check

```
sudo apachectl configtest
```

## Reload apache web server after config file modification

### Example for editing

```
$ sudo vi /etc/apache2/httpd.conf
```

```
sudo apachectl graceful
```

```
sudo apachectl -k graceful
```

## If you want to check command result

add `echo $?` after the command.

### Example

```
sudo apachectl restart; echo $?
```
