FROM mysql:5.7.25
ENV DEBIAN_FRONTEND=noninteractive
COPY ./conf/my.cnf /etc/my.cnf
