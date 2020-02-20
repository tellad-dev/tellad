FROM php:fpm

VOLUME ./:/var/www/
WORKDIR /var/www/
COPY php.ini /usr/local/etc/php

RUN apt update && apt -y upgrade\
    && apt install -y libpq-dev\
    && docker-php-ext-install pdo pdo_pgsql\
    && apt clean