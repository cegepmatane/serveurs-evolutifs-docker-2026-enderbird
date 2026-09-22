# ARRÊTER ET SUPPRIMER LES NŒUDS
docker rm -f \
  swarm-node01 \
  swarm-node02 \
  swarm-node03 \
  swarm-node04 \
  swarm-node05

# SUPPRIMER LE RÉSEAU
docker network rm reseau-swarm
