#!/bin/bash

# ACCÉDER AU DOCKER
# docker exec -it swarm-node01 sh


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