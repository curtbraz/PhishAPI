FROM mysql:8.0
ENV DEBIAN_FRONTEND=noninteractive
COPY ./db/DatabaseSQLDump.sql /docker-entrypoint-initdb.d/DatabaseSQLDump.sql
COPY ./conf/mysqld.cnf /etc/mysql/mysql.conf.d/mysqld.cnf
