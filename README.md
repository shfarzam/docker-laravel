
# Laravel Project
A Sample Project to show how could the Laravel by docker config and RUN in WEB and API full.

## Usage


To get started, make sure you have [Docker installed](https://docs.docker.com/docker-for-mac/install/) on your system, and then clone this repository.

First add your entire Laravel project to the `src` folder, then open a terminal and from this cloned respository's root run `docker-compose up -d --build`. Open up your browser of choice to [http://localhost:8080](http://localhost:8080) and you should see your Laravel app running as intended. **Your Laravel app needs to be in the src directory first before bringing the containers up, otherwise the artisan container will not build, as it's missing the appropriate file.** 

**Please do not forget to make your _.env_ File in _/src_ Folder**


## API Routes

First you need valid Token to could send/receive Data over API.

- **Get Login Token**
```
GET: 157.90.254.193/api/login

JSON BODY:
{
    "email"    : "test@test.com",
    "password" : "secret"
}
```

- **Add new Customer**
```
POST: 157.90.254.193/api/customers

JSON BODY:
{
     "customer_id": number,
     "first_name" : "string",
     "last_name"  : "string",
     "email"      : "test@test.com"
}
```

- **Edit Customer Data**
```
PUT: 157.90.254.193/api/customers

JSON BODY:
{
     "customer_id": number, (You can not Change Customer Id but you need to send it to recognize which Customer Data must change)
     "first_name" : "string",
     "last_name"  : "string",
     "email"      : "test@test.com"
}
```
- **Show Customers List**
```
GET: 157.90.254.193/api/customers

JSON BODY:
{

}
```

- **Add new Product**
```
POST: 157.90.254.193/api/products

JSON BODY:
{
    "product_id" : number,
    "p_name"     : "string" (Product Name)
}
```

- **Show Product List**
```
GET: 157.90.254.193/api/products

JSON BODY:
{

}
```

- **Add new Order**
```
POST: 157.90.254.193/api/orders

JSON BODY:
{
    "customer_id" : number,
    "order_id"    : number,
    "product_id"  : number
}
```

- **Show Order List**
```
GET: 157.90.254.193/api/orders

JSON BODY:
{

}
```

- **Add new User (Just Admin)**
```
POST: 157.90.254.193/api/users

JSON BODY:
{
    "first_name" : "string",
    "last_name"  : "string",
    "email"      : "test@test.com",
    "password"   : "secret"
}
```

- **Show User List (Just admin)**
```
GET: 157.90.254.193/api/users

JSON BODY:
{

}
```
## Laravel Usage [[resource](https://laravel.com/docs/8.x)]

### artisan

**Run PHP Container**
- ``docker exec -it php /bin/sh``


**Composer Update**
- ``php composer update``
  
**API KEY**
- ``php artisan apikey:generate Laravel``

**Create Tables with Sample Data** 
- ``php artisan migrate --seed``
- ``php artisan migrate:fresh --seed``

**JWT Installing** [[resource](https://jwt-auth.readthedocs.io/en/develop/)]
- ``composer require tymon/jwt-auth``
- ``php artisan jwt:secret``

**Clear Route and Config** 
- ``php artisan config:clear``
- ``php artisan route:clear``

**Run Sample Test**
- ``php artisan test --testsuite=Feature``


### mysql

**Run MYSQL Container and connect MySQL**
- ``docker exec -it mysql mysql -u{user} -p{secret} -h {host}``

## Docker

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
