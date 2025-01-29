FROM ubuntu:22.04
# FROM ubuntu:latest


ENV DEBIAN_FRONTEND=noninteractive 
ENV TZ=Europe/Madrid

# Actualización e instalación de apache y php
RUN apt-get update \
    && apt-get install -y apache2 \
    && apt-get install -y php \
    && apt-get install -y libapache2-mod-php \
    && apt-get install -y php-mysql \
    && rm -rf /var/lib/apt/lists/*

# Copia el contenido del sitio en el documentroot del sitio de apache
# COPY /src /var/www/html
# Copia la configuración del sitio en el directorio de configuración de los sitios
# COPY /conf/000-default.conf /etc/apache2/sites-available/

EXPOSE 80

ENTRYPOINT ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]