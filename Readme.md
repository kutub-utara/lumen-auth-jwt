Membuat Json Web Token (JWT) di Lumen 5.7

#tools & depedency
firebasephp-jwt version 5.0
Postman

#install fresh Lumen
lumen new lumen-auth-jwt

#buat file .env & tambahkan APP_KEY + JWT_SECRET
cp .env.example .env
Tambahkan nilai pada APP_KEY & JWT_SECRET.

#buat table users menggunakan migration
php artisan make:migration create_users_table

#buat data dummy dengan faker
1. Edit 'database/factories/ModelFactory.php'
2. Buat 'UsersTableSeeder' dengan 'php artisan make:seeder UsersTableSeeder'
3. Tambahkan code di 'UsersTableSeeder' untuk membuat data seed menggunakan factory
4. Daftarkan 'UsersTableSeeder' di 'database/seeds/DatabaseSeeder.php'
5. Eksekusi dengan perintah 'php artisan migrate' & 'php artisan db:seed'

#Aktifkan Facades & Eloquent di bootstrap/app.php

#Menggunakan library jwt firebase/php-jwt dan install via composer
composer require firebase/php-jwt

#membuat route untuk login 'auth/login'
$router->post('/auth/login', ['uses'=>'AuthController@authenticate']);

#membuat controller 'AuthController' dan method 'authenticate'

#test get token dengan akses localhost:8000/auth/login

#buat middleware untuk proteksi request

#aktifkan middleware di 'bootstrap/app.php'

#buat route untuk get user yang diproteksi middleware

#test get user dengan token di localhost:8000/users
