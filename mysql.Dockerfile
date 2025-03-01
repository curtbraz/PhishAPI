FROM mysql:5.7.25
ENV DEBIAN_FRONTEND=noninteractive
COPY ./db/DatabaseSQLDump.sql /docker-entrypoint-initdb.d/DatabaseSQLDump.sql
COPY ./conf/my.cnf /etc/my.cnf
