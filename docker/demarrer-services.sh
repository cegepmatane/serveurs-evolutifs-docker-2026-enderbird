#!/bin/bash
set -e

cheminFichierTemoin="/var/lib/mysql/initialise.flag"
cheminBaseDeDonnees="/docker-entree/base-de-donnees.sql"

# 1. Démarrer MariaDB en arrière-plan
service mariadb start

# 2. Attendre que MariaDB réponde
until mysqladmin ping --silent; do
    sleep 1
done

# 3. Premier démarrage : préparer la base (voir l'étape 02)
if [ ! -f "$cheminFichierTemoin" ]; then
    # Créer la base et le compte attendus par wp-config.php
    mysql -e "CREATE DATABASE cornucopia;
        CREATE USER 'flora'@'localhost' IDENTIFIED BY 'potager-2026';
        GRANT ALL PRIVILEGES ON nom-de-la-base.* TO 'flora'@'localhost';"

    # Importer la sauvegarde de la base de Cornucopia
    mysql cornucopia < $cheminBaseDeDonnees

    touch "$cheminFichierTemoin"
fi

# 4. Apache en avant-plan = PID 1 du conteneur
exec apache2-foreground