FROM almalinux:latest

RUN yum install -y epel-release && yum clean all
RUN yum -y update && yum clean all

RUN yum -y install httpd

RUN dnf module enable php:8.0 -y
RUN yum -y install php

# ssh接続
RUN yum install -y openssh-server
RUN sed -i 's/#\?PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config
RUN sed -i 's/#Port 22/Port 20022/' /etc/ssh/sshd_config
RUN ssh-keygen -t rsa -N "" -f /etc/ssh/ssh_host_rsa_key
EXPOSE 20022

# user作成
COPY useradd.sh .
RUN chmod +x useradd.sh
RUN ./useradd.sh
RUN echo 'root:root' | chpasswd

# httpd
RUN chown -R apache:apache /var/www/html

# sed
RUN sed -i 's/UserDir disabled/#UserDir disabled/' /etc/httpd/conf.d/userdir.conf
RUN sed -i 's/#UserDir public_html/UserDir public_html/' /etc/httpd/conf.d/userdir.conf

RUN sed -i 's/;listen.owner \= nobody/listen.owner \= apache/' /etc/php-fpm.d/www.conf
RUN sed -i 's/;listen.group \= nobody/listen.group \= apache/' /etc/php-fpm.d/www.conf
RUN sed -i 's/listen.acl_users \= apache,nginx/;listen.acl_users \= apache,nginx/' /etc/php-fpm.d/www.conf
RUN sed -i 's/AllowOverride none/AllowOverride All/g' /etc/httpd/conf/httpd.conf
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/httpd/conf/httpd.conf

RUN sed -i 's/^#LogLevel INFO/LogLevel INFO/' /etc/ssh/sshd_config

COPY ./app/ /var/www/html/
COPY ./app/ /var/www/backup_html/
COPY ./seo_app/ /home/seo/public_html/
COPY ./kikuchi_app /home/kikuchi/public_html

RUN systemctl enable php-fpm
RUN systemctl enable httpd
CMD ["sleep", "infinity"]
