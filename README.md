# Ligue1 Backend (Laravel)

Bienvenue dans le backend de l'application Ligue1 ! Cette partie du projet est construite avec Laravel pour fournir une API robuste et sécurisée.

## Configuration initiale

Assurez-vous d'avoir PHP, Composer, et MySQL installés sur votre machine.

```
# Installation des dépendances
composer install

# Configuration de l'environnement
cp .env.example .env

# Génération de la clé d'application
php artisan key:generate

# Exécution des migrations pour créer la structure de la base de données
php artisan migrate
Scripts disponibles
Dans le répertoire du projet, vous pouvez exécuter les scripts suivants :

# Lancement du serveur de développement
php artisan serve

# Exécution des tests
php artisan test
Structure du projet
app/ : Contient les fichiers source de l'application Laravel.
database/migrations/ : Définit la structure des données de l'application en utilisant les migrations Laravel.
routes/ : Définit les points de terminaison de l'API en associant les routes aux contrôleurs correspondants.
Configuration de l'environnement
Assurez-vous d'avoir configuré le fichier .env avec les informations de votre base de données.

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nom_de_votre_base_de_donnees
DB_USERNAME=votre_nom_utilisateur
DB_PASSWORD=votre_mot_de_passe
Utilisation de l'API

Inscription d'un nouvel utilisateur :
curl -X POST -H "Content-Type: application/json" -d '{"name": "votre_nom", "email": "votre_email", "password": "votre_mot_de_passe"}' http://localhost:8000/register

Connexion d'un utilisateur :
curl -X POST -H "Content-Type: application/json" -d '{"email": "votre_email", "password": "votre_mot_de_passe"}' http://localhost:8000/login

Récupérer le classement des équipes :
curl -X GET http://localhost:8000/classement

Récupérer les informations d'une équipe :
curl -X GET http://localhost:8000/equipe

Retourner les informations de l'utilisateur connecté :
curl -X GET -H "Authorization: Bearer VOTRE_TOKEN" http://localhost:8000/user

Créer un nouveau post :
curl -X POST -H "Authorization: Bearer VOTRE_TOKEN" -H "Content-Type: application/json" -d '{"title": "titre_du_post", "content": "contenu_du_post"}' http://localhost:8000/posts/create

Auteur
CAN (Code Anything Now)

Licence
Ce projet est sous licence MIT - voir le fichier LICENSE pour plus de détails.
