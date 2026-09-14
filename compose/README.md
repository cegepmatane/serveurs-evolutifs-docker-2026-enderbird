# USERNAME: citron
# MOTDEPASSE: citron
# EMAIL: citron@citron.citron

wordpress
http://localhost:8082/

phpmyadmin
http://localhost:8083/


### (STARTER)
docker compose up -d


### 1. Pause : conteneurs arretes mais conserves
```bash
sudo docker compose stop
sudo docker compose start
# tous est comme avant
```

### 2. Rangement : enleve conteneurs et reseau, PRESERVE ./fichiers-wordpress et ./database

```bash
sudo docker compose down
sudo docker compose up -d
# l'article temoin a survecu
```

### 3. Incendie volontaire : la base brule

```bash
sudo docker compose down
sudo rm -rf ./database
sudo docker compose up -d
# la base renait de la sauvegarde : l'article temoin a disparu
```
