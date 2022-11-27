## Step Test

Steps :
- composer install
- cp .env.example .env
- ./vendor/bin/sail up
- ./vendor/bin/sail artisan key:generate
- ./vendor/bin/sail artisan migrate
- ./vendor/bin/sail artisan db:seed
- ./vendor/bin/sail artisan send:email
- ./vendor/bin/sail artisan queue:work

## Env
- Redis
- MySQL
- Mailtrap (https://mailtrap.io)
