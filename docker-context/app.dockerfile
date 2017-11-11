FROM php:7.0.4-fpm

RUN apt-get update && apt-get install -y libmcrypt-dev \
    mysql-client libmagickwand-dev --no-install-recommends \
    && pecl install xdebug \
    && docker-php-ext-install mcrypt pdo_mysql

RUN echo 'zend_extension="/usr/local/php/modules/xdebug.so"' >> /etc/php.ini
