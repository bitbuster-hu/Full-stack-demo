FROM php:8.1-apache
RUN apt-get update

RUN apt-get install -y apt-utils

# Add NodeJS LTS Repository
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash -

RUN apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    zip \
    default-mysql-client


# COMPOSER INSTALL
RUN curl -sSfo /tmp/composer.phar https://getcomposer.org/installer
RUN php /tmp/composer.phar --install-dir=/usr/local/bin --filename=composer

# Install PHP extensions
RUN docker-php-ext-install -j$(nproc) pdo pdo_mysql \
    && docker-php-ext-install -j$(nproc) zip
