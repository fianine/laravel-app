## Step Test

Steps :
- composer install
- ./vendor/bin/sail up
- cp .env.example .env
- ./vendor/bin/sail artisan key:generate
- ./vendor/bin/sail artisan migrate
- ./vendor/bin/sail artisan db:seed
- ./vendor/bin/sail artisan queue:work
