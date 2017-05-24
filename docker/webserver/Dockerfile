# get the base image we need for docker
FROM php:5.6-apache

# get the packages needed for extension
RUN apt-get update -y && apt-get install -y libpng-dev curl libcurl4-openssl-dev

# install needed extensions for php
RUN docker-php-ext-install pdo pdo_mysql gd curl

# mod_rewrite apache
RUN a2enmod rewrite
RUN service apache2 restart