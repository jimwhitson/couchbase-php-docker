FROM php:7.1-fpm-jessie
RUN apt-get update
RUN apt-get install -y wget lsb-release
RUN wget http://packages.couchbase.com/releases/couchbase-release/couchbase-release-1.0-4-amd64.deb
RUN dpkg -i couchbase-release-1.0-4-amd64.deb
RUN rm couchbase-release-1.0-4-amd64.deb
RUN apt-get update
RUN apt-get install -y libcouchbase-dev build-essential zlib1g-dev
RUN pecl install couchbase

WORKDIR /var/www/html
 
COPY ./configuration/php.ini /usr/local/etc/php/
COPY ./configuration/www.conf /usr/local/etc/php-fpm.d/
COPY ./application/ /var/www/html/
 
RUN chown www-data:www-data . -R


