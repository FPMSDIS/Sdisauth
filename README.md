# PACKAGE D'AUTHENTIFICATION SERVICE DEVELOPPEMENT

## Description

- Ce package est un service d'authentification développé en PHP.
- Il permet de gérer les utilisateurs et leurs informations de connexion.
- Il utilise la base de données MySQL pour stocker les informations des utilisateurs.
- Il utilise le framework Laravel Breeze pour l'authentification et Spatie pour les permissions'.

## INSTALLATION

### Première Installation

- 1- Créez un nouveau projet Laravel en utilisant la commande 

    ```
        composer create-project --prefer-dist laravel/laravel monprojet
    ```

- 2- ```cd``` **monprojet**
- 3- ```composer require fpmsdis/sdisauth```
- 4- ```php artisan breeze:install```
- 5- 
    ```
        php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
    ```
- 6- 
    ``` 
        php artisan vendor:publish --tag=sdisauth --force
        php artisan vendor:publish --tag=sdisauth-migrations --force
        php artisan vendor:publish --tag=config --force
        php artisan vendor:publish --tag=sdisauth-assets --force
        php artisan vendor:publish --tag=sdisauth-routes --force
        php artisan vendor:publish --tag=sdisauth-controllers --force
        php artisan vendor:publish --tag=sdisauth-requests --force
        php artisan vendor:publish --tag=sdisauth-models --force
        php artisan vendor:publish --tag=sdisauth-seeders --force 
    ```

- 7- Décommentez tout le contenu du  fichier ``` authentificationRoutes.php ``` se trouvant dans : ``` routes/web/.. ```
- 8- Supprimez tout le contenu du fichier auth.php à la racine du dossier ``` routes/... ``` (Facultatif)
    
- 9- Actualiser les informations de l'application
    ```
        php artisan migrate:fresh --seed
        php artisan optimize:clear
    ```
- 10- Vérifier si la route est disponible dans votre projet avec la commande suivante : ```php artisan route:list```

## ✅ Résumé du comportement après publication
Visible sur 👤 GitHub: [@fpmsdis](https://github.com/fpmsdis)

| Élément       | Destination dans le projet Laravel après publication |
|--------------|---------------------------------------------------|
| **Vues**      | `resources/views/` |
| **Assets**    | `public/` |
| **Controllers** | `app/Http/Controllers/Sdisauth/` |
| **Routes**    | `routes/sdisauth/web/` |
| **Config**    | `config/sdisauth.php` |
| **Migrations** | `database/migrations/` |
| **Models** | `app/Models/` |
| **Requests**  | `app/Http/Requests/Sdisauth/` |



## **Deuxième Installation**

Une commande qui fait tout le travail pour vous, l'installation et la publication des fichiers
- 1- 
    ```
        php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
        php artisan vendor:publish --provider="Sdisauth\AuthServiceProvider" --force
    ```
- 2- Décommentez tout le contenu du  fichier ```authentificationRoutes.php``` se trouvant dans : ``` routes/web/.. ```
- 3- Supprimez tout le contenu du fichier auth.php à la racine du dossier ``` routes/... ``` (Facultatif)

- 4-
    ```
        php artisan migrate:fresh --seed
        php artisan optimize:clear
    ```

- 5- Vérifier si la route est disponible dans votre projet avec la commande suivante :      
    ```
        php artisan route:list
    ```


### **Usage**

- ✅ Utilisation de template dans le fichier de base avant publication : 

    ``` 
        @extends('sdisauth::layouts.auth')
        @section('content')
            <h1>Bienvenue sur mon package !</h1>
        @endsection
    ```

- ✅ Utilisation de template dans le fichier de base après publication : 

    ``` 
        @extends('layouts.auth')
        @section('content')
            <h1>Bienvenue sur mon package !</h1>
        @endsection
    ```

- ✅ Utilisation des vues dans les controllers avant publication
    ```
        return view('sdisauth::dashboard');
    ```

- ✅ Utilisation des vues dans les controllers après publication
    ```
        return view('dashboard');
    ```

- ✅ Gestion des Assets (CSS, JS, Images)
    - Après publication des assets, vous pouvez les utiliser comme suit :

        ```
            <link rel="stylesheet" href="{{ asset('css/style.css') }}">
            <script src="{{ asset('js/app.js') }}"></script>
        ```

    - Sans avoir publié

        ```
            <link rel="stylesheet" href="{{ asset('vendor/sdisauth/css/style.css') }}">
        ```
## Accès à l'application (Compte crée) Admin

### Login : **admin@fpmnet.ci**
### Mot de passe : **password**

## Auteur

Développé par [FPM-SDIS](https://github.com/fpmsdis)
👤 GitHub: [@fpmsdis](https://github.com/fpmsdis)
