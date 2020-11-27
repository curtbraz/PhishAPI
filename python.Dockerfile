FROM python:2.7
ENV DEBIAN_FRONTEND=noninteractive

ADD Responder /
CMD [ "python", "./Responder.py", "-I", "eth0", "-wrf"]
RUN apt-get update
RUN apt-get install mariadb-client -y