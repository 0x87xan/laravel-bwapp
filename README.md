
# CSRF Attack

1) Clone branch csrf with the following commnad

```console
$ git clone -b csrf https://github.com/0x87xan/laravel-bwapp.git
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
$ npm run dev
```
it will run vite dev server

5) From another terminal window run the following command, it will run php dev server

```console
$ php artisan serve
```
to specify host use ***--host=ip*** argument

6) Connect to your local database using .env file, example is stored in root directory, all supported drivers are in ***config/database.php***

7) From terminal run migrations to the database with the following command

```console
$ php artisan migrate --seed
```
--seed argument will fill tables with data

8) Go to /login page, login with username from db and password (12345678)

9) CSRF protection for changing name or email form (on ***/profile*** page) disable, so you can immediately try to do csrf attack. On this stage i faced the issues.

