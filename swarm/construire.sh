#!/bin/bash

# Étape 01 dans démarrer.sh

# ==========================================
# Étape 02 - Les Jetons
# ==========================================

# Initialiser le Swarm sur le premier gestionnaire
docker exec swarm-node01 \
  docker swarm init --advertise-addr 192.168.56.10

# Récupérer les deux jetons
JETON_GESTIONNAIRE=$(docker exec swarm-node01 docker swarm join-token manager -q)
JETON_TRAVAILLEUR=$(docker exec swarm-node01 docker swarm join-token worker -q)

# Joindre les deux autres gestionnaires
docker exec swarm-node02 \
  docker swarm join --token "$JETON_GESTIONNAIRE" 192.168.56.10:2377

docker exec swarm-node03 \
  docker swarm join --token "$JETON_GESTIONNAIRE" 192.168.56.10:2377

# Joindre les deux travailleurs
docker exec swarm-node04 \
  docker swarm join --token "$JETON_TRAVAILLEUR" 192.168.56.10:2377

docker exec swarm-node05 \
  docker swarm join --token "$JETON_TRAVAILLEUR" 192.168.56.10:2377

# ==========================================
# Étape 03 - Réseau
# ==========================================
docker exec swarm-node01 \
  mkdir -p /home/docker/swarm
docker cp traefik.yml swarm-node01:/home/docker/swarm/traefik.yml

docker exec swarm-node01 \
  docker network create -d overlay net
docker exec swarm-node01 \
  docker stack deploy --compose-file=/home/docker/swarm/traefik.yml traefik

# ==========================================
# Étape 04 - Préparer la sauvegarde
# ==========================================

# Créer le dossier sur les deux travailleurs
docker exec swarm-node04 mkdir -p /home/docker/swarm
docker exec swarm-node05 mkdir -p /home/docker/swarm

# Copier le ZIP sur les deux travailleurs
docker cp sauvegarde-cornucopia-formation.zip swarm-node04:/home/docker/swarm/
docker cp sauvegarde-cornucopia-formation.zip swarm-node05:/home/docker/swarm/

# Décompresser sur swarm-node04
docker exec swarm-node04 sh -c '
    cd /home/docker/swarm &&
    unzip -q sauvegarde-cornucopia-formation.zip -d sauvegarde &&
    ls sauvegarde &&
    chown -R 33:33 sauvegarde/fichiers-wordpress &&
    sed -i "s/'\''localhost'\''/'\''db:3306'\''/" sauvegarde/fichiers-wordpress/wp-config.php &&
    grep DB_HOST sauvegarde/fichiers-wordpress/wp-config.php
'

# Décompresser sur swarm-node05
docker exec swarm-node05 sh -c '
    cd /home/docker/swarm &&
    unzip -q sauvegarde-cornucopia-formation.zip -d sauvegarde &&
    ls sauvegarde &&
    chown -R 33:33 sauvegarde/fichiers-wordpress &&
    sed -i "s/'\''localhost'\''/'\''db:3306'\''/" sauvegarde/fichiers-wordpress/wp-config.php &&
    grep DB_HOST sauvegarde/fichiers-wordpress/wp-config.php
'

# Modifier la base de données sur swarm-node04
docker exec swarm-node04 sh -c '
    cd /home/docker/swarm &&
    tee -a sauvegarde/base-de-donnees.sql <<'\''FIN'\''
UPDATE wp_options SET option_value='\''http://192.168.56.10'\''
    WHERE option_name IN ('\''siteurl'\'','\''home'\'');
UPDATE wp_posts SET post_content = REPLACE(post_content,
    '\''https://cornucopia.projet.autos'\'', '\''http://192.168.56.10'\'');
UPDATE wp_posts SET guid = REPLACE(guid,
    '\''https://cornucopia.projet.autos'\'', '\''http://192.168.56.10'\'');
FIN
    tail -n 6 sauvegarde/base-de-donnees.sql &&
    mkdir -p /home/docker/swarm/database &&
    ls -1 /home/docker/swarm
'

# ==========================================
# Étape 05 - Déployer la pile WordPress
# ==========================================

# Copier la pile sur le gestionnaire
docker cp wordpress-sticky.yml swarm-node01:/home/docker/swarm/wordpress-sticky.yml

# Déployer la pile depuis swarm-node01
docker exec swarm-node01 \
  docker stack deploy \
  --compose-file=/home/docker/swarm/wordpress-sticky.yml \
  wordpress-sticky

# ==========================================
# Étape 06 - Déployer le visualiseur
# ==========================================

docker exec swarm-node01 \
  docker service create \
  --name=viz \
  --publish=5000:8080/tcp \
  --constraint=node.role==manager \
  --mount=type=bind,src=/var/run/docker.sock,dst=/var/run/docker.sock \
  dockersamples/visualizer

echo "FININIIIIIII!!!!!!!!"