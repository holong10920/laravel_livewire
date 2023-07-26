FROM php:8.1.0-fpm
RUN docker-php-ext-install pdo pdo_mysql

RUN curl -s https://nodejs.org/dist/v14.17.6/node-v14.17.6-linux-x64.tar.gz  -o node-v14.17.6-linux-x64.tar.gz
RUN tar --strip-components 1 -xzvf node-v14.17.6-linux-x64.tar.gz -C /usr/local
RUN rm  node-v14.17.6-linux-x64.tar.gz

WORKDIR /var/www/html

COPY /php-fpm/init-app.sh /usr/local/bin/

RUN chmod +x /usr/local/bin/init-app.sh

ENTRYPOINT ["sh", "/usr/local/bin/init-app.sh"]
