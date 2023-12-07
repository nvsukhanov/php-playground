FROM php:fpm

RUN apt update && apt install -y \
    git \
    zip \
    unzip \
    libzip-dev

RUN docker-php-ext-install zip
RUN pecl install xdebug && docker-php-ext-enable xdebug
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
RUN addgroup --gid 1000 laravel && adduser --gid 1000 --shell /bin/sh laravel
RUN mkdir -p /var/www/html
RUN chown -R laravel:laravel /var/www/html

ADD ./docker/php/www.conf /usr/local/etc/php-fpm.d/www.conf

