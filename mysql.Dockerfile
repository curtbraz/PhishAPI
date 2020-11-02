FROM mysql:5.7.25
ENV DEBIAN_FRONTEND=noninteractive
COPY ./mysqld.cnf /etc/mysql/mysql.conf.d/mysqld.cnf