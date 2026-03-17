FROM php:8.2-apache
RUN docker-php-ext-install mysqli pdo pdo_mysql
COPY ./public /var/www/html
COPY ./src /var/www/src
COPY ./apache.conf /etc/apache2/sites-available/000-default.conf
EXPOSE 80
