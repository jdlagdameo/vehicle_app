FROM php:7.4.8-apache as base_lamp_image

RUN apt-get install -y --no-install-recommends zip unzip libpq-dev libjpeg-dev libpng-dev gnupg2 zlib1g-dev msmtp apt-utils libaio1 

RUN apt-get install -y \
        libzip-dev \
        zip 
        
RUN apt-get -y clean && \
    apt-get -y update && \
    apt-get -y install git curl zlib1g-dev libcurl4-gnutls-dev && \
    docker-php-ext-install -j$(nproc) bcmath zip pdo_mysql mysqli curl pcntl && \
    sed -i 's#DocumentRoot /var/www/html#DocumentRoot /var/www/html/public#' /etc/apache2/sites-enabled/000-default.conf && \
    a2enmod rewrite

COPY . /var/www/html

WORKDIR /var/www/html

EXPOSE 80
