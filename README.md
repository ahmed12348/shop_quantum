Installation
Clone the repo

git clone https://github.com/ahmed12348/shop_quantum.git
Install Composer packages

composer install
Copy the environment file & edit it accordingly

cp .env.example .env
Generate application key

php artisan key:generate

php artisan migrate --seed
1-php artisan db:seed --class=PermissionTableSeeder
2-php artisan db:seed --class=CreateAdminUserSeeder
3-php artisan db:seed --class=CategoryTableSeeder
4-php artisan db:seed --class=ProductTableSeeder

Linking Storage folder to public

Serve the application

php artisan serve


