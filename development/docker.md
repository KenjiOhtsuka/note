---
layout: page
---

# Docker

## Command

### Run

```sh
docker run
```

### List containers

```sh
docker ps -a
```

ストップしているコンテナを含めて全てのコンテナを表示する。

### Remove Container

```sh
docker rm [container id or name]
```

### Start

```sh
docker start -i [container id or name]
```

## Log

remove log 

* the following command shows the log file location
    * `docker inspect CONTAINER_ID --format "{% raw %}{{.LogPath}}{% endraw %}"`
* rotation
    * `docker run -d --log-opt max-size=100m --log-opt max-file=10 my-docker-image`
        * `--log-opt max-size=XX`, `--log-opt max-file=XX`, 

## Jupyter notebook

`jupyter notebook --ip=0.0.0.0 --allow-root`

ip, allow-root options are required to launch the notebook in docker.
