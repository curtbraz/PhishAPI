FROM php:7.4.3-apache
ENV DEBIAN_FRONTEND=noninteractive
RUN docker-php-ext-install mysqli pdo_mysql
RUN a2enmod ssl
RUN a2enmod headers
RUN apt-get update
RUN apt-get install python python-pip cron mariadb-client zip libcurl4-openssl-dev wget libgmp-dev re2c libmhash-dev libmcrypt-dev file -y
RUN pip install python-docx
ADD html /var/www/html
RUN docker-php-ext-configure gmp 
RUN docker-php-ext-install gmp
RUN docker-php-ext-configure bcmath 
RUN docker-php-ext-install bcmath
RUN docker-php-ext-configure curl
RUN docker-php-ext-install curl
RUN wget -O "/var/www/browscap.ini" https://browscap.org/stream?q=Full_PHP_BrowsCapINI
COPY ./conf/crontab /var/www/crontab
RUN mkdir /var/www/uploads
RUN mkdir /var/www/html/phishingdocs/hosted
RUN chmod 777 /var/www/ -R
RUN crontab /var/www/crontab
