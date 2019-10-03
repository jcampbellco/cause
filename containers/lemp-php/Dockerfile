# Use the latest PHP FPM (fast process manager - for NginX) official Alpine image
# The Alpine image is based off a tiny version of Linux (Alpine Linux), and unless you are
# doing anything quite advanced with your setup you probably won't need a full Debian-based image
FROM php:fpm-alpine

RUN apk update

RUN apk add icu-libs

RUN apk add icu-dev

RUN apk upgrade

RUN docker-php-ext-configure intl

# Install PHP's PDO and PDO_MySQL extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql intl

# Install Composer globally
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php -r "if (hash_file('sha384', 'composer-setup.php') === 'a5c698ffe4b8e849a443b120cd5ba38043260d5c4023dbf93e1558871f1f07f58274fc6f4c93bcfd858c6bd0775cd8d1') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
    php composer-setup.php --install-dir=/bin --filename=composer && \
    php -r "unlink('composer-setup.php');"
