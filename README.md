#######################################################
#########################   Readme   ##################
#######################################################

Pour une nouvelle installaion (récommandéé):
1. Telecharger  le projet sur github sans le dossier "vendor"
2. Dans le terminal (cmd), se deplacer à la racine du projet
3. Exécuter "composer update" pour telecharger les depandances
4. Renomer le fichier "projet.env" en ".env"
5. Créer le base de données sous Mysql puis paramettrer le fichier .env à la racine du projet
6. Exécuter les migration "php artisan migrate" dans le terminal (cmd)
7. Exécuter "php arisan serve" Puis se rendre sur localhost:8000 dans le navigateur
8. Installer et demarrer elasticsearch
9. Modifier la colone "zoneRencontree_id" en "zone_rencontree_id" dans la table de relation "plante_zoneRencontee"
10. Créer un nouveau admin
11. 
#########################################################
