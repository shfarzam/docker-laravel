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
