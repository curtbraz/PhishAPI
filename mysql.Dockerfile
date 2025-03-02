FROM mysql:5.7.25
ENV DEBIAN_FRONTEND=noninteractive
COPY ./db/DatabaseSQLDump.sql /etc/DatabaseSQLDump.sql
ADD ./db/DatabaseSQLDump.sql /docker-entrypoint-initdb.d/1.sql
COPY ./conf/my.cnf /etc/my.cnf
RUN chown -R mysql:mysql /docker-entrypoint-initdb.d/
CMD ["mysqld", "--character-set-server=utf8mb4", "--collation-server=utf8mb4_unicode_ci"]
