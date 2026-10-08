#!/bin/bash

echo "=========================================="
echo "Démarrage des services Swarm"
echo "=========================================="

# ==========================================
# Vérifier que node01 est un manager
# ==========================================

echo ""
echo "Vérification du Swarm..."

docker exec swarm-node01 docker info --format '{{.Swarm.LocalNodeState}}'

if [ $? -ne 0 ]; then
    echo "ERREUR : impossible d'interroger le Swarm."
    exit 1
fi

# Vérifier l'état du Swarm
ETAT_SWARM=$(docker exec swarm-node01 docker info --format '{{.Swarm.LocalNodeState}}')

if [ "$ETAT_SWARM" != "active" ]; then
    echo "ERREUR : le Swarm n'est pas actif."
    echo "État : $ETAT_SWARM"
    exit 1
fi

echo "Swarm actif."

# ==========================================
# Afficher les nœuds
# ==========================================

echo ""
echo "Nœuds du Swarm :"

docker exec swarm-node01 docker node ls

# ==========================================
# Vérifier / créer le réseau overlay
# ==========================================

echo ""
echo "Vérification du réseau overlay net..."

if ! docker exec swarm-node01 docker network inspect net >/dev/null 2>&1; then

    echo "Le réseau net n'existe pas."
    echo "Création du réseau overlay net..."

    docker exec swarm-node01 \
      docker network create \
      --driver overlay \
      net

else

    echo "Le réseau overlay net existe déjà."

fi

# ==========================================
# Traefik
# ==========================================

echo ""
echo "Déploiement de Traefik..."

docker cp traefik.yml \
  swarm-node01:/home/docker/swarm/traefik.yml

docker exec swarm-node01 \
  docker stack deploy \
  --compose-file=/home/docker/swarm/traefik.yml \
  traefik

# ==========================================
# WordPress
# ==========================================

echo ""
echo "Déploiement de WordPress..."

docker cp wordpress-sticky.yml \
  swarm-node01:/home/docker/swarm/wordpress-sticky.yml

docker exec swarm-node01 \
  docker stack deploy \
  --compose-file=/home/docker/swarm/wordpress-sticky.yml \
  wordpress-sticky

# ==========================================
# Visualiseur
# ==========================================

echo ""
echo "Vérification du visualiseur..."

if ! docker exec swarm-node01 \
    docker service inspect viz >/dev/null 2>&1; then

    echo "Création du visualiseur..."

    docker exec swarm-node01 \
      docker service create \
      --name=viz \
      --publish=5000:8080/tcp \
      --constraint=node.role==manager \
      --mount=type=bind,src=/var/run/docker.sock,dst=/var/run/docker.sock \
      dockersamples/visualizer

else

    echo "Le visualiseur existe déjà."

fi

# ==========================================
# Résultat
# ==========================================

echo ""
echo "=========================================="
echo "Services actuellement dans le Swarm"
echo "=========================================="

docker exec swarm-node01 docker service ls

echo ""
echo "=========================================="
echo "Stacks"
echo "=========================================="

docker exec swarm-node01 docker stack ls

echo ""
echo "=========================================="
echo "FIN DU DÉMARRAGE DES SERVICES"
echo "=========================================="