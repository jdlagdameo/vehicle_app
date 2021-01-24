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
  
RUN docker-php-ext-install pgsql pdo_pgsql pdo_mysql mysqli zip gd 

FROM base_lamp_image as set_as_web_app
ENV APP_HOME /var/www/html
RUN usermod -u 1000 www-data && groupmod -g 1000 www-data
#RUN usermod -a -G 1002 www-data
RUN a2enmod rewrite
RUN a2enmod headers
RUN sed -i -e "s/html/html\/public/g" /etc/apache2/sites-enabled/000-default.conf


## Security Update
# RUN sed -i -e "s/ServerTokens OS/ServerTokens Prod/g" /etc/apache2/conf-enabled/security.conf
# RUN sed -i -e "s/ServerSignature On/ServerSignature Off/g" /etc/apache2/conf-enabled/security.conf
# RUN sed -i -e "s/expose_php = On/expose_php = Off/g" /usr/local/etc/php/php.ini-production
# RUN sed -i -e 's/#Header set X-Content-Type-Options: "nosniff"/Header set X-Content-Type-Options "nosniff"/' /etc/apache2/conf-enabled/security.conf
# RUN sed -i -e 's/#Header set X-Frame-Options: "sameorigin"/Header always append X-Frame-Options DENY/g' /etc/apache2/conf-enabled/security.conf

# RUN echo 'Header set X-XSS-Protection "1; mode=block"' >> /etc/apache2/conf-enabled/security.conf
# RUN echo 'Header set Strict-Transport-Security "max-age=31536000; includeSubDomains"' >> /etc/apache2/conf-enabled/security.conf
# RUN echo 'Header set Content-Security-Policy "frame-ancestors DENY"' >> /etc/apache2/conf-enabled/security.conf

FROM set_as_web_app as packager_installed
RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin --filename=composer \
    && composer self-update 
    #\
    #&& composer global require hirak/prestissimo --quiet --no-plugins --no-scripts --no-interaction --no-progress --ansi --no-suggest

FROM packager_installed as dependency_installed
COPY src/package* $APP_HOME/

RUN mv /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini

COPY src/composer* $APP_HOME/
RUN cd $APP_HOME \
    && php -d memory_limit=-1 `which composer` install --verbose \
    --quiet --no-autoloader --no-dev --no-interaction --no-progress --ansi \
    --no-suggest --prefer-dist --no-scripts \
    && rm -rf /root/.composer

RUN ls -la
RUN echo "ServerName localhost" | tee /etc/apache2/conf-available/servername.conf
RUN a2enconf servername

FROM dependency_installed as laravel_web_app
WORKDIR $APP_HOME
COPY src/ .
RUN ls -lrt
RUN chmod g+s $APP_HOME/storage
RUN chown -R www-data:www-data $APP_HOME
RUN php -d memory_limit=-1 `which composer` dump-autoload --quiet --optimize

#CMD ["apachectl", "-D", "FOREGROUND"]
