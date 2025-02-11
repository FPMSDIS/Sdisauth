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
- 13- ```php artisan migrate```
- 14- ```php artisan config:clear```
- 15- ```php artisan cache:clear```
- 16- ```php artisan route:clear```
 
### **Deuxième Installation** 

Une commande qui fait tout le travail pour vous, l'installation et la publication des fichiers
- 1- ```php artisan sdisauth:install```

### **Usage**

- ✅ Utilisation de template dans le fichier de base : 

    ```@extends(config('sdisauth.layout'))```

- ✅ Les vues sont intégrées dans le package (resources/views).
- ✅ Les vues peuvent être utilisées directement depuis le package

    ```view('sdisauth::auth.login'))```
