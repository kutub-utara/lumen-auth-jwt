<h1>Membuat Json Web Token (JWT) di Lumen 5.7</h1>

<h5>#tools & depedency</h5>
firebasephp-jwt version 5.0
Postman

<h5>#install fresh Lumen</h5>
lumen new lumen-auth-jwt

<h5>#buat file .env & tambahkan APP_KEY + JWT_SECRET</h5>
cp .env.example .env
Tambahkan nilai pada APP_KEY & JWT_SECRET.

<h5>#buat table users menggunakan migration</h5>
php artisan make:migration create_users_table

<h5>#buat data dummy dengan faker</h5>
1. Edit 'database/factories/ModelFactory.php'
2. Buat 'UsersTableSeeder' dengan 'php artisan make:seeder UsersTableSeeder'
3. Tambahkan code di 'UsersTableSeeder' untuk membuat data seed menggunakan factory
4. Daftarkan 'UsersTableSeeder' di 'database/seeds/DatabaseSeeder.php'
5. Eksekusi dengan perintah 'php artisan migrate' & 'php artisan db:seed'

<h5>#Aktifkan Facades & Eloquent di bootstrap/app.php</h5>

<h5>#Menggunakan library jwt firebase/php-jwt dan install via composer</h5>
composer require firebase/php-jwt

<h5>#membuat route untuk login 'auth/login'</h5>
$router->post('/auth/login', ['uses'=>'AuthController@authenticate']);

<h5>#membuat controller 'AuthController' dan method 'authenticate'</h5>

<h5>#test get token dengan akses localhost:8000/auth/login</h5>

<h5>#buat middleware untuk proteksi request</h5>

<h5>#aktifkan middleware di 'bootstrap/app.php'</h5>

<h5>#buat route untuk get user yang diproteksi middleware</h5>

<h5>#test get user dengan token di localhost:8000/users</h5>
