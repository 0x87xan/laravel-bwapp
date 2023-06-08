# SQL Injection

[![PHP Version](https://img.shields.io/badge/PHP-^8.1-blue.svg)](https://www.php.net/releases/8.1.0.php)
[![Laravel Version](https://img.shields.io/badge/Laravel-^10.8-orange.svg)](https://laravel.com/docs/10.x)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

This version of application created for demonstration of mistakes in queries to database that can lead to sql injection
attack that can be performed against web application.


## Setup


1) Clone branch sql-injectable with the following command

```console
$ git clone -b sql-injectable https://github.com/0x87xan/laravel-bwapp.git
```

2) Install all npm dependencies with the following command

```console
$ npm install
```

3) Install all composer dependencies with following command
```console
$ composer install
```
4) From terminal, in the cloned directory, run following command

```console
$ npm run build
```
it will build all necessary files

5) From terminal run the following command, it will run local php server

```console
$ php artisan serve
```
to specify host use ***--host=ip*** argument

6) Run the following command in terminal

```console
$ cp .env.example .env
```

7) Connect to your local database using .env file, example is stored in root directory, all supported drivers are in ***config/database.php***

8) From terminal run migrations to the database with the following command

```console
$ php artisan migrate --seed
```
--seed argument will fill tables with data

9) Go to /login page, login with username from db and password (12345678)

10) Test this invulnerable web application version for vulnerabilities.
