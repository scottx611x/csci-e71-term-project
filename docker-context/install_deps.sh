cp .env.prod .env

curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer
composer install --no-interaction --prefer-source
php artisan key:generate
php artisan optimize
php artisan migrate