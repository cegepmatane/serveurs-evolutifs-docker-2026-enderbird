#!/bin/bash

echo "=========================================="
echo "Arrêt des nœuds Swarm"
echo "=========================================="

docker stop \
  swarm-node01 \
  swarm-node02 \
  swarm-node03 \
  swarm-node04 \
  swarm-node05

echo ""
echo "=========================================="
echo "Nœuds arrêtés."
echo "Les données sont conservées."
echo "=========================================="