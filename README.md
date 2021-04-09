# docker-laravel
A Simple Project to show how could the Laravel Framework by docker config and RUN.


Info:
  - Docker
  - Git
  - PHP
  - MySQL
  - Nginx
  - Node
  - npm
  - Vue
  - JQuery
  - Bootstrap
## Usage

To get started, make sure you have [Docker installed](https://docs.docker.com/docker-for-mac/install/) on your system, and then clone this repository.

#Docker
Run git on Server
```
docker build -t git:latest .
```

```
docker run -it --rm -v $PWD:/repo -w /repo git pull
```

```
docker-compose up --build -d
```
