FROM python:2.7
ENV DEBIAN_FRONTEND=noninteractive

ADD Responder /
ADD ./Responder.conf /Responder/
CMD [ "python", "./Responder.py", "-I", "eth0", "-wrf"]
RUN apt-get update
RUN apt-get install -y mariadb-client