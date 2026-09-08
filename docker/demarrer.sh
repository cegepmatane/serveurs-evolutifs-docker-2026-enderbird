#!/bin/bash
set -e

docker rm -f boutique-cornucopia
docker run --name boutique-cornucopia -p "8080:80" boutique-cornucopia:1.0