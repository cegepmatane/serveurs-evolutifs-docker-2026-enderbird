#!/bin/bash

# ==========================================
# Démarrage / création du réseau
# ==========================================

# Créer le réseau seulement s'il n'existe pas
if ! docker network inspect reseau-swarm >/dev/null 2>&1; then
    echo "Création du réseau reseau-swarm..."

    docker network create \
      --subnet 192.168.56.0/24 \
      reseau-swarm
else
    echo "Le réseau reseau-swarm existe déjà."
fi


# ==========================================
# Fonction pour démarrer ou créer un nœud
# ==========================================

creer_ou_demarrer() {
    NOM=$1
    IP=$2

    if docker inspect "$NOM" >/dev/null 2>&1; then

        echo "$NOM existe déjà."

        if [ "$(docker inspect -f '{{.State.Running}}' "$NOM")" = "false" ]; then
            echo "Démarrage de $NOM..."
            docker start "$NOM"
        else
            echo "$NOM est déjà démarré."
        fi

    else

        echo "Création de $NOM..."

        docker run -d --privileged \
          --name "$NOM" \
          --hostname "$NOM" \
          --network reseau-swarm \
          --ip "$IP" \
          -e DOCKER_TLS_CERTDIR="" \
          -e DOCKER_MIN_API_VERSION=1.24 \
          docker:dind

    fi
}


# ==========================================
# Création / démarrage des 5 nœuds
# ==========================================

creer_ou_demarrer swarm-node01 192.168.56.10
creer_ou_demarrer swarm-node02 192.168.56.20
creer_ou_demarrer swarm-node03 192.168.56.30
creer_ou_demarrer swarm-node04 192.168.56.40
creer_ou_demarrer swarm-node05 192.168.56.50


echo ""
echo "=========================================="
echo "Les 5 nœuds sont démarrés."
echo "=========================================="
echo ""
echo "Attendre environ 30 secondes avant de lancer construire.sh"