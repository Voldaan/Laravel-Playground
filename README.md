# Laravel-REST-API

## Getting started

First, clone the repository to your local machine:
```
git clone https://github.com/Voldaan/Laravel-REST-API.git
```
Next up, create a .env file and past the data from .env-example into it.
After which you'll want to install all dependencies needed to run the application. This can be done by running the following command in the root of the project:
```
composer install
```
While we're
After which you can run the docker compose script in the root of the project to initialize the database:
```
docker-compose up
```

Once you got the database up and running, it's time to fill it with data. First we'll generate the needed database tables with:
```
php artisan migrate
```
After which we can fill the database with data by running:
```
php artisan db:seed
```

Then finally you can generate a key, and use the application.
Using the application can be done by running:
```
php artisan serve
```
And then clicking the link in the console. This'll lead you to a page where the key can be generated before you can access the api endpoints.

To login with the seeded account, use the following information:
```
"email": "admin@test.com",
"password": "password"
```