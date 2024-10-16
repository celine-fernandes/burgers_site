# Snack Town - Application de Gestion de Fast-Food

Snack Town est une application web qui permet de gérer les articles de fast-food et leurs catégories. Elle permet d'ajouter, modifier, supprimer et afficher des produits, ainsi que d'afficher un tableau de bord pour gérer les catégories et articles. Ce site utilise PHP et MySQL avec une structure de type MVC basique.

## Fonctionnalités

- **Affichage des catégories et produits** : L'utilisateur peut naviguer entre les catégories pour voir les produits disponibles.
- **CRUD Produits** :
  - Ajouter de nouveaux produits avec une image, un prix et une catégorie.
  - Modifier les produits existants.
  - Supprimer des produits.
  - Voir les détails d'un produit spécifique.
- **CRUD Catégories** :
  - Gérer les catégories d'articles.
- **Login d'admin** : Interface de connexion pour les administrateurs afin de gérer les produits et catégories.
- **Tableau de bord** : Affichage des articles les plus récents, nombre total de catégories et produits

## Installation

### Prérequis

- Serveur web (Apache, Nginx, etc.)
- PHP >= 7.4
- MySQL

### Étapes d'installation

1. Clonez le projet :
    ```bash
    git clone https://github.com/celine-fernandes/snack_town.git
    ```

2. Importez la base de données (ou créez une base de données avec une structure similaire)

3. Mettez à jour les informations de connexion à la base de données dans le fichier `database.php` :
    ```php
    private static $dbHost = " ";
    private static $dbName = " ";
    private static $dbUsername = " ";
    private static $dbUserpassword = " ";
    ```

4. Démarrez le serveur local et accédez à l'application via votre navigateur :
    ```bash
    php -S localhost:8000
    ```


