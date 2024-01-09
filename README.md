# Ligue1 Backend (Laravel)

Bienvenue dans le backend de l'application Ligue1 ! Cette partie du projet est construite avec Laravel pour fournir une API robuste et sécurisée.

## Configuration initiale

Assurez-vous d'avoir PHP, Composer, et MySQL installés sur votre machine.

# Installation des dépendances
```bash 
composer install
```

# Configuration de l'environnement
```bash 
cp .env.example .env
```

# Génération de la clé d'application
```bash 
php artisan key:generate
```

# Exécution des migrations pour créer la structure de la base de données
```bash
php artisan migrate
```
Scripts disponibles
Dans le répertoire du projet, vous pouvez exécuter les scripts suivants :

# Lancement du serveur de développement
```bash
php artisan serve
```

# Exécution des tests
```bash
php artisan test
```
Structure du projet

app/ : Contient les fichiers source de l'application Laravel.
database/migrations/ : Définit la structure des données de l'application en utilisant les migrations Laravel.
routes/ : Définit les points de terminaison de l'API en associant les routes aux contrôleurs correspondants.

Configuration de l'environnement
```bash 
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```
Utilisation de l'API

Inscription d'un nouvel utilisateur :
```bash
curl -X POST -H "Content-Type: application/json" -d '{"name": "votre_nom", "email": "votre_email", "password": "votre_mot_de_passe"}' http://164.90.163.120:8000/api/register
```

Connexion d'un utilisateur :
```bash 
curl -X POST -H "Content-Type: application/json" -d '{"email": "votre_email", "password": "votre_mot_de_passe"}' http://164.90.163.120:8000/api/login
```

Récupérer le classement des équipes :
```bash
curl -X GET -d '{"id_saison": "id de la saison en int (269 pour la saison 2023-2024/ 167 pour la saison 2022-2023)"} http://164.90.163.120:8000/api/classement
```

Récupérer les informations d'une équipe :
```bash
curl -X GET -d '{"id_saison": "id de la saison en int (269 pour la saison 2023-2024", "id_equipe": "id de l'équipe (59 pour l'om)"}
http://164.90.163.120:8000/api//equipe
```

Retourner les informations d'un post :
```bash
curl -X GET -H  http://164.90.163.120:8000/api/post
```

Créer un nouveau post :
```bash
curl -X POST -H "Authorization: Bearer VOTRE_TOKEN" -H "Content-Type: application/json" -d '{"title": "titre_du_post", "content": "contenu_du_post"}' http://164.90.163.120:8000/api/posts/create
```

Supprime un post :
```bash
curl -X DEL -H "Authorization: Bearer VOTRE_TOKEN" -H "Content-Type: application/json" -http://164.90.163.120:8000/api/posts/{post}
```
Modifie un post :
```bash
curl -X PUT -H "Authorization: Bearer VOTRE_TOKEN" -H "Content-Type: application/json" -d '{"title": "nouveau_titre_du_post", "content": "nouveau_contenu_du_post"}' http://164.90.163.120:8000/api/posts/{post}
```

Collection des routes API PostMan/Insomnia ...
[Api_Route_Insomina…] 

Auteur
Louis

Licence
Ce projet est sous licence MIT
