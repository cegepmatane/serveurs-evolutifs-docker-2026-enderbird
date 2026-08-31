#!/bin/bash
set -e

cheminFichierTemoin="/var/lib/mysql/initialise.flag"
cheminBaseDeDonnees="/docker-entree/base-de-donnees.sql"
DB_NAME=$(grep "DB_NAME" /var/www/html/wp-config.php | sed -E "s/.*'([^']+)'.*/\1/")
DB_USER=$(grep "DB_USER" /var/www/html/wp-config.php | sed -E "s/.*'([^']+)'.*/\1/")
DB_PASSWORD=$(grep "DB_PASSWORD" /var/www/html/wp-config.php | sed -E "s/.*'([^']+)'.*/\1/")

# 1. Démarrer MariaDB en arrière-plan
service mariadb start

# 2. Attendre que MariaDB réponde
until mysqladmin ping --silent; do
    sleep 1
done

# 3. Premier démarrage : préparer la base (voir l'étape 02)
if [ ! -f "$cheminFichierTemoin" ]; then
    # Créer la base et le compte attendus par wp-config.php
    mysql -e "CREATE DATABASE $DB_NAME;
        CREATE USER '$DB_USER'@'localhost' IDENTIFIED BY '$DB_PASSWORD';
        GRANT ALL PRIVILEGES ON $DB_NAME.* TO '$DB_USER'@'localhost';"

    # Importer la sauvegarde de la base de Cornucopia
    mysql $DB_NAME < $cheminBaseDeDonnees

    # Bug de localhost pas le bon sur le site
    mysql "$DB_NAME" -e "UPDATE wp_options SET option_value='http://localhost:8080' WHERE option_name IN ('siteurl','home');"

    touch "$cheminFichierTemoin"
fi

# 4. Apache en avant-plan = PID 1 du conteneur
exec apache2-foreground