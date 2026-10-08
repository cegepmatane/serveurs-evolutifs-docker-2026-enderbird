PREMIERE FOIS:
demarrer.sh
construire.sh

arreter.sh (garder données)
detruire.sh (tout supprimer)

DEUXIEME FOIS FOIS:
demarrer.sh
demarrer-services.sh





docker network ls

Voir les 5 noeuds

http://192.168.56.10:5000
http://192.168.56.10/
http://192.168.56.10:9090/dashboard/
http://192.168.56.10/wp-admin/

UTILISATEUR: flora
PASSWORD: cornucopia-2026


cedri@PORTABLE-CED-LINUX:~/DOCKERPROJETS/serveurs-evolutifs-docker-2026-enderbird/swarm$ docker exec swarm-node01 docker service ls
ID             NAME                         MODE         REPLICAS   IMAGE                             PORTS
vfrcx2uofmju   traefik_loadbalancer         replicated   1/1        traefik:1.7                       *:80->80/tcp, *:9090->8080/tcp
usm8bogm3c1k   viz                          replicated   1/1        dockersamples/visualizer:latest   *:5000->8080/tcp
ruxiq1ipilp0   wordpress-sticky_db          replicated   1/1        mysql:8.0                         
uuwctcm8wzsd   wordpress-sticky_wordpress   replicated   3/3        wordpress:7.1                     *:30000->80/tcp
