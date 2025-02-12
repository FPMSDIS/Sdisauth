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
- 17- Vérifier si la route est disponible dans votre projet avec la commande suivante : ```php artisan route:list```
 

### **Deuxième Installation** 

Une commande qui fait tout le travail pour vous, l'installation et la publication des fichiers
- 1- ```php artisan sdisauth:install```

- 2- ```php artisan migrate```
- 3- ```php artisan config:clear```
- 4- ```php artisan cache:clear```
- 5- ```php artisan route:clear```
- 6- Vérifier si la route est disponible dans votre projet avec la commande suivante : ```php artisan route:list```


### **Usage**

- ✅ Utilisation de template dans le fichier de base : 

    ```@extends('sdisauth::layouts.app')

        @section('content')
            <h1>Bienvenue sur mon package !</h1>
        @endsection
    ```

- ✅ Utilisation des vues dans les controllers
    ``` return view('sdisauth::dashboard'); ```

- ✅ Gestion des Assets (CSS, JS, Images)
    - Après publication des assets, vous pouvez les utiliser comme suit :

        ```<link rel="stylesheet" href="{{ asset('sdisauth/css/style.css') }}">```
        ```<script src="{{ asset('sdisauth/js/script.js') }}"></script>```

    - Sans avoir publié

        ```<link rel="stylesheet" href="{{ asset('vendor/sdisauth/css/style.css') }}">```


