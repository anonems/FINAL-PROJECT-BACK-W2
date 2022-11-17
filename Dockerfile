FROM php:8.1.2-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql \
    && a2enmod rewrite

RUN apt-get update -y \
    && apt-get install libyaml-dev -y \
    && pecl install yaml && echo "extension=yaml.so" > /usr/local/etc/php/conf.d/ext-yaml.ini && docker-php-ext-enable yaml

RUN curl -sS https://getcomposer.org/installer | php -- \
        &&  mv composer.phar /usr/local/bin/composer