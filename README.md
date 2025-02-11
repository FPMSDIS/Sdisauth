# PACKAGE D'AUTHENTIFICATION SERVICE DEVELOPPEMENT

## Description

- Ce package est un service d'authentification développé en PHP.
- Il permet de gérer les utilisateurs et leurs informations de connexion.
- Il utilise la base de données MySQL pour stocker les informations des utilisateurs.
- Il utilise le framework Laravel pour la gestion des routes et des contrôleurs.

## INSTALLATION

### Première Installation 

- 1- Créez un nouveau projet Laravel en utilisant la commande ```composer create-project --prefer-dist laravel/laravel monprojet```
- 2- ```cd``` **monprojet**
- 3- ```composer require "fpmsdis/sdisauth": "^1.0"```
- 4- ```php artisan vendor:publish --tag=sdisauth```
- 5- ```php artisan vendor:publish --tag=sdisauth-migrations```
- 6- ```php artisan vendor:publish --tag=config```
- 7- ```php artisan vendor:publish --tag=sdisauth-assets```
- 8- ```php artisan vendor:publish --tag=sdisauth-routes```
- 9- ```php artisan vendor:publish --tag=sdisauth-controllers```
- 10- ```php artisan vendor:publish --tag=sdisauth-requests```
- 11- ```php artisan breeze:install```
- 12- ```php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"```
- 13- Inclure les routes du package `sdisauth` dans le fichier de route de base `web.php`
    ```require base_path('vendor/sdisauth/web/userRolePermission.php');```
- 14- ```php artisan migrate```
- 15- ```php artisan config:clear```
- 16- ```php artisan cache:clear```
- 17- ```php artisan route:clear```
- 18- Vérifier si la route est disponible dans votre projet avec la commande suivante : ```php artisan route:list```
 

### **Deuxième Installation** 

Une commande qui fait tout le travail pour vous, l'installation et la publication des fichiers
- 1- ```php artisan sdisauth:install```
- 2- Inclure les routes du package `sdisauth` dans le fichier de route de base `web.php`
    ```require base_path('vendor/sdisauth/web/userRolePermission.php');```

- 3- ```php artisan migrate```
- 4- ```php artisan config:clear```
- 5- ```php artisan cache:clear```
- 6- ```php artisan route:clear```
- 7- Vérifier si la route est disponible dans votre projet avec la commande suivante : ```php artisan route:list```


### **Usage**

- ✅ Utilisation de template dans le fichier de base : 

    ```@extends(config('sdisauth.layout'))```

- ✅ Les vues sont intégrées dans le package (resources/views).
- ✅ Les vues peuvent être utilisées directement depuis le package

    ```view('sdisauth::auth.login'))```
