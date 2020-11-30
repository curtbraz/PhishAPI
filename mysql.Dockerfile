FROM mysql:5.7.25
ENV DEBIAN_FRONTEND=noninteractive
COPY ./conf/mysqld.cnf /etc/mysql/mysql.conf.d/mysqld.cnf