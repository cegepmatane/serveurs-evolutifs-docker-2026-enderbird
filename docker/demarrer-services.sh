#!/bin/bash
set -e

# 1. Démarrer MariaDB en arrière-plan
service mariadb start

# 2. Attendre que MariaDB réponde
until mysqladmin ping --silent; do
    sleep 1
done

# 3. Premier démarrage : préparer la base (voir l'étape 02)

# 4. Apache en avant-plan = PID 1 du conteneur
exec apache2-foreground