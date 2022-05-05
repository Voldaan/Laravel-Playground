# Laravel-REST-API

## Getting started

First, clone the repository to your local machine:
```
git clone https://github.com/Voldaan/Laravel-Playground.git
```
Install all dependencies needed to run the application. This can be done by running the following command in the folder where `composer.json` and `composer.lock` are located. In our case, this is the `api` folder:
```
composer install
```

While the dependencies are being installed, create an `.env` file and paste the data from `.env-example` into it.

While we're in the folder for our Laravel project, you want to generate your application encryption key using:
```
php artisan key:generate
```

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
The link in the console will open up the standard view endpoint.

To login with the seeded account, use the following information:
```
"email": "admin@test.com",
"password": "password"
```