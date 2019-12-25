## About this Repo

Laravel 5.8 simple CRUD and API with some basic PHP unit test. Powered by Laravel Passport for API auth

## Installation

```
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
npm install
php artisan passport:install
```

## Admin access

```
u: admin@crudapi.test
p: admin123
```

## Unit Test

```
vendor/bin/phpunit
```

## Note

- Please update APP_URL in .env and .env.testing

## API Documentation

- [Postman API endpoint documentation](https://documenter.getpostman.com/view/1035812/SWLZeq5f?version=latest)
- [Postman API endpoint collection](https://www.getpostman.com/collections/652bf0a887f75eae8fd4)

## Minion?

```
http://crudapi.test/minionids
```


