FROM mysql:5.7.25
ENV DEBIAN_FRONTEND=noninteractive
COPY ./db/DatabaseSQLDump.sql /etc/DatabaseSQLDump.sql
COPY ./db/DatabaseSQLDump.sql /docker-entrypoint-initdb.d/1.sql
COPY ./conf/my.cnf /etc/my.cnf
#RUN /etc/init.d/mysql start && mysql --protocol=tcp -u root -ppassword -h 0.0.0.0 -p 3306 < /etc/DatabaseSQLDump.sql
