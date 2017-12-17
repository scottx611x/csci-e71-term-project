cp .env.prod .env

curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
php /usr/local/bin/composer install --no-interaction --prefer-source --no-dev
php artisan key:generate
php artisan optimize
bash -c 'while [[ "$(curl -s -o /dev/null -w ''%{http_code}'' database:33061)" != "200" ]]; do sleep 5; done'
php artisan migrate