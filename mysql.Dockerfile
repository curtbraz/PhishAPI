FROM mysql:5.7.25
ENV DEBIAN_FRONTEND=noninteractive
#COPY ./db/DatabaseSQLDump.sql /etc/DatabaseSQLDump.sql
#COPY ./conf/my.cnf /etc/my.cnf
COPY ./conf/mysqld.cnf /etc/mysql/mysql.conf.d/mysqld.cnf
