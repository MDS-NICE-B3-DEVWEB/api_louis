# Nom de Votre Projet

## Introduction

Bienvenue dans le projet XYZ ! Ce projet est une API Laravel pour la gestion d'une ligue sportive.

## Architecture du Projet

Le projet suit une structure modulaire pour maintenir la clarté et la facilité d'extension. Voici une brève explication des différents dossiers et fichiers :

- `config/` : Contient les fichiers de configuration pour l'application.
- `app/Http/Controllers/` : Gère la logique métier de l'application. Chaque fichier correspond généralement à une entité de l'API.
- `app/Http/Middleware/` : Contient les middlewares, tels que l'authentification.
- `database/migrations/` : Définit la structure des données de l'application en utilisant les migrations Laravel pour interagir avec la base de données.
- `routes/` : Définit les points de terminaison de l'API en associant les routes aux contrôleurs correspondants.

## Configuration de l'environnement

Clonez ce référentiel sur votre machine locale.

```bash
git clone <url-du-repo>
composer install

Créez un fichier .env à la racine du projet et ajoutez les variables suivantes.
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret

Exécutez les migrations pour créer la structure de la base de données.
php artisan migrate

Exécutez l'application.
php artisan serve

Utilisation de l'API
Inscription d'un nouvel utilisateur :
curl -X POST -H "Content-Type: application/json" -d '{"name": "votre_nom", "email": "votre_email", "password": "votre_mot_de_passe"}' http://localhost:8000/register

