# docker-laravel
A Simple Project to show how could the Laravel by docker config and RUN.




#Docker
Run git on Server
```
docker build -t git:latest .
```

```
docker run -it --rm -v $PWD:/repo -w /repo git pull
```

