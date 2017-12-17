cp .env.prod .env

curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
php /usr/local/bin/composer install --no-interaction --prefer-source --no-dev
php artisan key:generate
php artisan optimize
php artisan migrate