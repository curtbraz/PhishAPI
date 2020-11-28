FROM php:7.4.3-apache
ENV DEBIAN_FRONTEND=noninteractive
RUN docker-php-ext-install mysqli pdo_mysql
RUN a2enmod ssl
RUN a2enmod headers
RUN apt-get update
RUN apt-get install -y python
RUN apt-get install -y python-pip
RUN apt-get install -y cron
RUN apt-get install -y mariadb-client
RUN pip install python-docx
RUN apt-get install -y zip
RUN apt-get install -y apt-utils
RUN apt-get install libcurl4-openssl-dev -y
ADD html /var/www/html
RUN apt-get install -y libgmp-dev re2c libmhash-dev libmcrypt-dev file
RUN docker-php-ext-configure gmp 
RUN docker-php-ext-install gmp
RUN docker-php-ext-configure bcmath 
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install curl
COPY ./000-default-le-ssl.conf /etc/apache2/sites-enabled/
COPY ./apache2.conf /etc/apache2/apache2.conf
COPY ./php.ini /etc/php/7.2/apache2/php.ini
COPY ./php.ini /usr/local/etc/php
COPY ./browscap.ini /var/www/browscap.ini
COPY ./.htpasswd /var/www/.htpasswd
COPY ./crontab /var/www/crontab
RUN mkdir /var/www/uploads
RUN mkdir /var/www/html/phishingdocs/hosted
RUN chmod 777 /var/www/ -R
RUN crontab /var/www/crontab
