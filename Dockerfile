FROM php:7.4.8-apache as base_lamp_image

RUN apt-get -y clean && \
    apt-get -y update && \
    sed -i 's#DocumentRoot /var/www/html#DocumentRoot /var/www/html/public#' /etc/apache2/sites-enabled/000-default.conf && \
    a2enmod rewrite

COPY . /var/www/html

WORKDIR /var/www/html

EXPOSE 80
