## Step Test

Steps :
- composer install
- ./vendor/bin/sail up
- cp .env.example .env
- php artisan key:generate
- php artisan queue:work
