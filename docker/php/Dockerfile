FROM php:7.4-fpm

RUN docker-php-ext-install pdo pdo_mysql

RUN pecl install xdebug && docker-php-ext-enable xdebug


WORKDIR /var/www/api

RUN chown -R www-data:www-data /var/www/api
