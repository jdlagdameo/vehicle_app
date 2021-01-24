FROM php:7.4.8-apache as base_lamp_image


RUN ls -la /etc/apache2/
RUN cat /etc/apache2/apache2.conf

RUN apt-get update
RUN apt-get install -y --no-install-recommends zip unzip libpq-dev libjpeg-dev libpng-dev gnupg2 zlib1g-dev msmtp apt-utils libaio1 
#RUN docker-php-ext-configure gd --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/ 
RUN docker-php-ext-configure gd --with-jpeg

RUN apt-get install -y \
        libzip-dev \
        zip \
  && docker-php-ext-install zip
  
RUN docker-php-ext-install pgsql pdo_pgsql zip gd 

FROM base_lamp_image as set_as_web_app
ENV APP_HOME /var/www/html
RUN usermod -u 1000 www-data && groupmod -g 1000 www-data
#RUN usermod -a -G 1002 www-data
RUN a2enmod rewrite
RUN a2enmod headers
RUN sed -i -e "s/html/html\/public/g" /etc/apache2/sites-enabled/000-default.conf

COPY . /var/www/html

WORKDIR /var/www/html

EXPOSE 80
