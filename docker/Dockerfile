FROM php:8.2-apache

ENV DEBIAN_FRONTEND=noninteractive

# Installer MariaDB, l'extension mysqli, activer la réécriture
RUN apt-get update \
    && apt-get install -y --no-install-recommends mariadb-server mariadb-client \