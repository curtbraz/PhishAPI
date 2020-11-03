FROM php:7.4.3-apache
ENV DEBIAN_FRONTEND=noninteractive
RUN docker-php-ext-install mysqli pdo_mysql
RUN a2enmod ssl
RUN apt-get update
RUN apt-get install -y python2.7
RUN apt-get install -y zip
RUN apt-get install -y apt-utils
RUN mkdir /etc/apache2/ssl
RUN mkdir /etc/apache2/ssl/crt
RUN mkdir /etc/apache2/ssl/key
RUN openssl req -new -x509 -days 365 -keyout /etc/apache2/ssl/key/vhost1.key -out /etc/apache2/ssl/crt/vhost1.crt -nodes -subj  '/O=VirtualHost Website Company name/OU=Virtual Host Website department/CN=www.virtualhostdomain.com'
COPY ./000-default-le-ssl.conf /etc/apache2/sites-enabled/
COPY ./apache2.conf /etc/apache2/apache2.conf
COPY ./php.ini /etc/php/7.2/apache2/php.ini
COPY ./php.ini /usr/local/etc/php
RUN chmod 777 /var/www/ -R
RUN chown www-data /var/www -R