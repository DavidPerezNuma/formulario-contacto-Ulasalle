
FROM php:8.2-apache

# Directorio de trabajo de la aplicación
WORKDIR /var/www/html

# Instalación de extensiones PHP y habilitación de módulos Apache
RUN docker-php-ext-install mysqli pdo pdo_mysql \
    && a2enmod rewrite

# Configuración de Apache
COPY apache.conf /etc/apache2/sites-available/000-default.conf

# Copia del código de la aplicación
COPY public/ .
COPY src/ /var/www/src

# Permisos correctos para Apache
RUN chown -R www-data:www-data /var/www

# Puerto expuesto por Apache
EXPOSE 80
