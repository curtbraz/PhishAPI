FROM php:7.4.3-apache
ENV DEBIAN_FRONTEND=noninteractive
RUN docker-php-ext-install mysqli pdo_mysql
RUN a2enmod ssl
RUN apt-get update
RUN apt-get install -y python2.7
RUN apt-get install -y zip
RUN apt-get install -y apt-utils
COPY ./000-default-le-ssl.conf /etc/apache2/sites-enabled/
COPY ./apache2.conf /etc/apache2/apache2.conf
COPY ./php.ini /etc/php/7.2/apache2/php.ini
COPY ./php.ini /usr/local/etc/php
RUN chmod 777 /var/www/ -R