
FROM php:7.1.1-fpm-alpine 

MAINTAINER hanhan1978 <ryo.tomidokoro@gmail.com>

# install libraries
RUN apk upgrade --update \
    && apk add \
       libmcrypt-dev \
       git \
       zlib-dev \
    && docker-php-ext-install  mcrypt \
    && docker-php-ext-install  pdo_mysql \
    && docker-php-ext-install  zip


# install composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
  && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
  && php -r "unlink('composer-setup.php');"

COPY laravel/composer.json /tmp/composer.json
COPY laravel/composer.lock /tmp/composer.lock
ENV COMPOSER_ALLOW_SUPERUSER 1
RUN composer install --no-scripts --no-autoloader -d /tmp


COPY laravel /var/www/laravel
#COPY run.sh /usr/local/bin/run.sh
#RUN chmod +x /usr/local/bin/run.sh
#
#COPY crontab /etc/cron.d/crontab
#
#
WORKDIR /var/www/laravel
## composer install

RUN mv /tmp/vendor ./ \
  && composer dump-autoload
#RUN composer install
#
RUN chown www-data:www-data storage/logs \
    && chown -R www-data:www-data storage/framework \
    && cp .env.example .env \
    && php artisan key:generate \
    && mkdir -p  /usr/share/nginx \
    && ln -s /var/www/laravel/public /usr/share/nginx/html
#
#
#CMD /usr/local/bin/run.sh
