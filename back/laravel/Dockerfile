# Устанавливаем базовый образ PHP
FROM php:8.2-fpm

# Установка утилиты unzip
#RUN apt-get update && apt-get install -y unzip libmagickwand-dev
RUN apt-get update && apt-get install -y unzip libmagickwand-dev

# Устанавливаем необходимые расширения PHP
#RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install pdo pdo_mysql gd

# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Установка дополнительных расширений PHP для Redis
RUN pecl install redis && docker-php-ext-enable redis

# Установка библиотеки ImageMagick
RUN pecl install imagick && docker-php-ext-enable imagick
#RUN docker-php-ext-install pdo pdo_mysql gd imagick

# Открываем порт для доступа к приложению
EXPOSE 8000
