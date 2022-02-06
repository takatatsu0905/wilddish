FROM php:8.0-apache-buster

ADD php.ini /usr/local/etc/php/
ADD 000-default.conf /etc/apache2/sites-enabled/

ENV COMPOSER_ALLOW_SUPERUSER=1

ARG WWW_USER_ID=${WWW_USER_ID}
ARG WWW_GROUP_ID=${WWW_GROUP_ID}

RUN usermod -u $WWW_USER_ID -o www-data
RUN groupmod -g $WWW_GROUP_ID -o www-data

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apt-get update -y && \
    apt-get upgrade -y && \
    apt-get -y install \
        libicu-dev \
        libzip-dev \
        libonig-dev \
        zip \
        unzip \
        libssl-dev  && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* && \
    docker-php-ext-install intl mbstring opcache pdo_mysql zip

COPY ./php.ini /usr/local/etc/php/php.ini
RUN mv /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled
RUN /bin/sh -c a2enmod rewrite
WORKDIR /var/www/html
