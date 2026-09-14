# USERNAME: citron
# MOTDEPASSE: citron
# EMAIL: citron@citron.citron

wordpress
http://localhost:8082/

phpmyadmin
http://localhost:8083/


docker compose stop
# pause : conteneurs arretes mais conserves
docker compose start
# reprise : tout revient tel quel
docker compose down
# rangement : enleve conteneurs et reseau, PRESERVE ./fichiers-wordpress et ./database
docker compose up -d
# l'article temoin a survecu
docker compose down
rm -rf ./database
# incendie volontaire : la base brule
docker compose up -d
# la base renait de la sauvegarde : l'article temoin a disparu, l'abonnement de Hazel est la