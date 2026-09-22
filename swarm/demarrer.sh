#demarrer.sh
#    │
#    ├── créer reseau-swarm
#    │
#    ├── créer swarm-node01
#    ├── créer swarm-node02
#    ├── créer swarm-node03
#    ├── créer swarm-node04
#    ├── créer swarm-node05
#    │
#    ├── swarm init sur node01
#    ├── node02 → manager
#    ├── node03 → manager
#    ├── node04 → worker
#    └── node05 → worker

#réseau reseau-swarm
#        ↓
#5 conteneurs DinD
#        ↓
#swarm-node01 = manager/leader
#        ↓
#node02 + node03 = managers
#node04 + node05 = workers

docker network create --subnet 192.168.56.0/24 reseau-swarm

docker run -d --privileged \
  --name swarm-node01 \
  --hostname swarm-node01 \
  --network reseau-swarm \
  --ip 192.168.56.10 \
  -e DOCKER_TLS_CERTDIR="" \
  -e DOCKER_MIN_API_VERSION=1.24 \
  docker:dind

docker run -d --privileged \
  --name swarm-node02 \
  --hostname swarm-node02 \
  --network reseau-swarm \
  --ip 192.168.56.20 \
  -e DOCKER_TLS_CERTDIR="" \
  -e DOCKER_MIN_API_VERSION=1.24 \
  docker:dind

docker run -d --privileged \
  --name swarm-node03 \
  --hostname swarm-node03 \
  --network reseau-swarm \
  --ip 192.168.56.30 \
  -e DOCKER_TLS_CERTDIR="" \
  -e DOCKER_MIN_API_VERSION=1.24 \
  docker:dind

docker run -d --privileged \
  --name swarm-node04 \
  --hostname swarm-node04 \
  --network reseau-swarm \
  --ip 192.168.56.40 \
  -e DOCKER_TLS_CERTDIR="" \
  -e DOCKER_MIN_API_VERSION=1.24 \
  docker:dind

docker run -d --privileged \
  --name swarm-node05 \
  --hostname swarm-node05 \
  --network reseau-swarm \
  --ip 192.168.56.50 \
  -e DOCKER_TLS_CERTDIR="" \
  -e DOCKER_MIN_API_VERSION=1.24 \
  docker:dind


echo "ATTENDRE UN 30 SECONDES AVANT D'EXÉCUTER LE SCRIPT construire.sh"