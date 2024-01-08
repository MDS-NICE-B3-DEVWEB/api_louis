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
DB_DATABASE=db_ligue1
DB_USERNAME=louis
DB_PASSWORD=1fK1gb4k
```
Utilisation de l'API

Inscription d'un nouvel utilisateur :
```bash
curl -X POST -H "Content-Type: application/json" -d '{"name": "votre_nom", "email": "votre_email", "password": "votre_mot_de_passe"}' http://localhost:8000/register
```

Connexion d'un utilisateur :
```bash 
curl -X POST -H "Content-Type: application/json" -d '{"email": "votre_email", "password": "votre_mot_de_passe"}' http://localhost:8000/login
```

Récupérer le classement des équipes :
```bash
curl -X GET http://localhost:8000/classement
```

Récupérer les informations d'une équipe :
```bash
curl -X GET http://localhost:8000/equipe
```

Retourner les informations de l'utilisateur connecté :
```bash
curl -X GET -H "Authorization: Bearer VOTRE_TOKEN" http://localhost:8000/user
```

Créer un nouveau post :
```bash
curl -X POST -H "Authorization: Bearer VOTRE_TOKEN" -H "Content-Type: application/json" -d '{"title": "titre_du_post", "content": "contenu_du_post"}' http://localhost:8000/posts/create
```

[Api_Route_Insomina…]()

Auteur
Louis

Licence
Ce projet est sous licence MIT
