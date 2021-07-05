FROM composer:2.0.8 as composerBuild
COPY composer* /app/
RUN composer install && composer development-disable

FROM php:7.4-apache
COPY --chown=www-data:www-data . /var/www/html
COPY --from=composerBuild --chown=www-data:www-data /app /var/www/html
RUN rm /var/www/html/config/autoload/local.php
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
RUN docker-php-ext-install pdo_mysql && a2enmod rewrite
