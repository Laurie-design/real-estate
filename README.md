# ImmoPlus
Cette application de gestion immobilière permet aux agents immobiliers de gérer leurs biens, de rendre certains biens publics pour les clients, et d'interagir avec les demandes et requêtes des clients.

## Fonctionnalités principales

- Gestion des biens immobiliers: Enregistrement des propriétés avec les détails du propriétaire..
- Visibilité des produits : Option pour les agents de rendre certaines propriétés visibles au public. 
- Interface client: Les clients peuvent envoyer des requêtes ou consulter les propriétés disponibles.
- Filtrage des requêtes: Les requêtes des clients sont filtrées et envoyées uniquement aux agents concernés.


## Prérequis
Avant de commencer, assurez-vous d'avoir les éléments suivants installés sur votre machine :

-PHP>= 8.1
- Composer(Gestionnaire de dépendances PHP)
- MySQL ou un autre SGBD compatible

## Installation
1. Clonez ce dépôt, utilisez la commande:
   `git clone https://github.com/Laurie-design/real-estate.git`
   `cd real-estate`

2. Installez les dépendances PHP avec Composer, utilisez la commande:
     `composer install`

3. Copiez le fichier .env.example en .env et configurez vos variables d'environnement,utilisez la commande:
    `cp .env.example .env`

4. Générez la clé de l'application, utilisez la commande:
    `php artisan key:generate`

5. Créez une base de données et configurez les paramètres de connexion dans le fichier .env:
    Ouvrez le fichier .env et configurez les paramètres suivants : la connexion à la base de données, y compris l'hôte, le nom d'utilisateur, le mot de passe, et le nom de la base de données, etc.
    **Example**
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nom_de_votre_base_de_donnees
    DB_USERNAME=nom_utilisateur_mysql
    DB_PASSWORD=mot_de_passe_mysql

6. Exécutez les migrations pour créer les tables de la base de données, utilisez la         commande:
    `php artisan migrate`

## Utilisation
Pour lancer le serveur de développement, utilisez la commande:
    `php artisan serve`

## Déploiement
Pour déployer cette application en production, assurez-vous de configurer correctement votre environnement de production, y compris la configuration du fichier .env, l'installation des dépendances, et l'exécution des migrations de la base de données.

## Auteur
MARDJA Liguili
Développeur et concepteur de l'application.
