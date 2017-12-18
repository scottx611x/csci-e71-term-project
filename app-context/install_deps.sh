cp .env.prod .env

curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
php /usr/local/bin/composer install --no-interaction --prefer-source
php artisan optimize
php artisan migrate
php artisan serve --host=0.0.0.0 --port=8000