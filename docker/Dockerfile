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

# Script de démarrage
COPY demarrer-services.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/demarrer-services.sh

# Préparer le dossier de données MariaDB
RUN mkdir -p /var/lib/mysql && chown -R mysql:mysql /var/lib/mysql

# Base de données et fichiers wordpress
COPY fichiers-wordpress/ /var/www/html/
COPY base-de-donnees.sql /docker-entree/
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

#[DÉFINITION]: exécuter un script comme main process
ENTRYPOINT ["/usr/local/bin/demarrer-services.sh"]