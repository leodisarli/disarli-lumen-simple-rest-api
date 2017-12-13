# Simple API REST + Simple Admin

Using Lumen, Facades, Eloquent, Bootstrap and Ajax

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

What things you need to install the software

```
PHP 7.0+, MySQL, Apache or Nginx and Composer
```

### Installing

After cloning the project, in his folder:

Run composer

```
composer install
```

Configure your database in .env file

```
vi .env
```

Run artisan migrate to create tables

```
php artisan migrate
```

Host the project

```
php -S localhost:8000 -t public
```

Now access your localhost to test

```
http://localhost:8000
```

## Testing the API endpoints

Use list bellow to test each one of the API endpoints

### Create

POST /api/v1/candidates

```
curl -i -X POST -H "Content-Type:application/json" http://localhost:8000/api/v1/candidates -d '{"name":"Albert Einstein", "age":"138"}'
```

### Edit

PUT /api/v1/candidates/1

```
curl -H "Content-Type:application/json" -X PUT http://localhost:8000/api/v1/candidates/1 -d '{"name":"Leonardo Da Vinci", "age":"565"}'
```

### List All

GET /api/v1/candidates

```
curl http://localhost:8000/api/v1/candidates
```

### View Details

GET /api/v1/candidates/1

```
curl http://localhost:8000/api/v1/candidates/1
```

### Delete

DELETE /api/v1/candidates/1

```
curl -X DELETE http://localhost:8000/api/v1/candidates/1
```

## Built With

* [Bootstrap](https://getbootstrap.com)
* [Font Awesome](http://fontawesome.io)
* [jQuery](https://jquery.com)
* [Laravel Eloquent](https://laravel.com/docs/5.5/eloquent)
* [Laravel Facades](https://laravel.com/docs/5.5/facades)
* [Lumen](https://lumen.laravel.com)

## Versioning

I use [SemVer](http://semver.org/) for versioning. 

## Authors

* **Leonardo Di Sarli** - *Initial work* - [DiSarli](http://disarli.com.br)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## To do list

* Auth
* Pagination
* Docs
* Filter
* Sort
* Search
* Fields
* Rate limit
* Error treatment
* HTTP status codes
