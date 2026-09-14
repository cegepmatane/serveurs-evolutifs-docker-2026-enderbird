#!/bin/bash
set -e

docker rm -f boutique-cornucopia 2>/dev/null || true
#docker run --name boutique-cornucopia -p "8080:80" boutique-cornucopia:1.0

mkdir -p "${PWD}/conteneur/mysql" 
mkdir -p "${PWD}/conteneur/uploads" 

docker run -d \
    --name boutique-cornucopia \
    -p "8080:80" \
    -v "${PWD}/conteneur/mysql:/var/lib/mysql" \
    -v "${PWD}/conteneur/uploads:/var/www/html/wp-content/uploads" \
    boutique-cornucopia:1.0