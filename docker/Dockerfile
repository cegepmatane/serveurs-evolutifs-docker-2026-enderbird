FROM php:8.2-apache

ENV DEBIAN_FRONTEND=noninteractive

# Installer MariaDB, l'extension mysqli, activer la réécriture
RUN apt-get update \
    && apt-get install -y --no-install-recommends mariadb-server mariadb-client \
    && docker-php-ext-install mysqli \
    && a2enmod rewrite \
    && sed -ri 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*