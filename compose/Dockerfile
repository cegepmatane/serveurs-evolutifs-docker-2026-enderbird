# ADRESSE-DE-VOTRE-INSTANCE = ce que vous taperez dans le navigateur, sans le port :
#   localhost        (Docker sur votre poste)
#   192.168.56.2     (machine virtuelle VirtualBox, son adresse IP vue de votre poste)
#   203.0.113.10     (VPS : son adresse IP publique, ou son nom de domaine)
$ tee -a base-de-donnees.sql <<'FIN'
UPDATE wp_options SET option_value='http://ADRESSE-DE-VOTRE-INSTANCE:8082'
    WHERE option_name IN ('siteurl','home');
UPDATE wp_posts SET post_content = REPLACE(post_content,
    'https://cornucopia.projet.autos', 'http://ADRESSE-DE-VOTRE-INSTANCE:8082');
UPDATE wp_posts SET guid = REPLACE(guid,
    'https://cornucopia.projet.autos', 'http://ADRESSE-DE-VOTRE-INSTANCE:8082');
FIN