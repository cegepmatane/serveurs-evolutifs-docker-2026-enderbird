#!/bin/bash
set -e

# 1. Démarrer MariaDB en arrière-plan
service mariadb start

# 2. Attendre que MariaDB réponde
until mysqladmin ping --silent; do
    sleep 1
done