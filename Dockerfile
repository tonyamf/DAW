# CodeIgniter 3.1.6 is not compatible with PHP 8, so stay on PHP 7.4.
FROM php:7.4-apache
ENV CI_ENV=production
RUN docker-php-ext-install mysqli
COPY LAB12/ /var/www/html/
RUN chown -R www-data:www-data /var/www/html/application/views/templates_c /var/www/html/application/logs
