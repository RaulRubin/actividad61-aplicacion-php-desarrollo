# Indica cuál es la imagen que vamos a utilizar como punto de partida para generar la nueva imagen
FROM ubuntu:22.04
# FROM ubuntu:latest

# Con la opción "noninteractive" evita tener que introducir valores de configuración de forma manual durante la instalación de algunos paquetes
ENV DEBIAN_FRONTEND=noninteractive 
ENV TZ=Europe/Madrid

# Actualización e instalación de apache y  todos las paquetes necesarios para ejecutar PHP y conectar a MySQL.
RUN apt-get update \
    && apt-get install -y apache2 \
    && apt-get install -y php \
    && apt-get install -y libapache2-mod-php \
    && apt-get install -y php-mysql \
    && rm -rf /var/lib/apt/lists/*

# Copia el contenido del directorio /src (contenido dle sitio) en el documentroot del sitio de apache (/var/www/html)
# COPY /src /var/www/html
# Copia la configuración del sitio en el directorio de configuración de los sitios
# COPY /conf/000-default.conf /etc/apache2/sites-available/

# Permite definir una variable de entorno y asignarle un valor por defecto. Disponible por los contenedores que se creen a partir de la imagen
# Se pueden sobreescribir con la opción --env de docker run 

ENV DB_HOST mariadb
ENV DB_NAME electroshop
ENV DB_USER usuario
ENV DB_PASSWORD usuario1

# La instrucción EXPOSE no publica el puerto al exterior, solo informa a Docker.
EXPOSE 80

# Configuramos el comando que ejecutarán los contenedores que se creen a partir de esta imagen cuando se inicien
ENTRYPOINT ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]