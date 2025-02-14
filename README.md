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
- 3- ```php artisan breeze:install```
- 4- 
    ```
        php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
    ```
- 5- ```php artisan vendor:publish --tag=sdisauth```
- 6- ```php artisan vendor:publish --tag=sdisauth-migrations```
- 7- ```php artisan vendor:publish --tag=config```
- 8- ```php artisan vendor:publish --tag=sdisauth-assets```
- 9- ```php artisan vendor:publish --tag=sdisauth-routes```
- 10- ```php artisan vendor:publish --tag=sdisauth-controllers```
- 11- ```php artisan vendor:publish --tag=sdisauth-requests```
- 12- ```php artisan vendor:publish --tag=sdisauth-models```
- 13- ```php artisan vendor:publish --tag=sdisauth-seeders```

- 14- Créer un fichier authentificationRoutes.php dans ```routes/web/..```
    ```
        <?php

            use App\Http\Controllers\Auth\AuthenticatedSessionController;
            use App\Http\Controllers\Auth\ConfirmablePasswordController;
            use App\Http\Controllers\Auth\EmailVerificationNotificationController;
            use App\Http\Controllers\Auth\EmailVerificationPromptController;
            use App\Http\Controllers\Auth\NewPasswordController;
            use App\Http\Controllers\Auth\PasswordController;
            use App\Http\Controllers\Auth\PasswordResetLinkController;
            use App\Http\Controllers\Auth\RegisteredUserController;
            use App\Http\Controllers\Auth\VerifyEmailController;
            use App\Http\Controllers\ProfileController;
            use Illuminate\Support\Facades\Route;

            Route::get('/', [AuthenticatedSessionController::class, 'create']);

            Route::middleware('guest')->group(function () {
                Route::get('register', [RegisteredUserController::class, 'create'])
                            ->name('register');

                Route::post('register', [RegisteredUserController::class, 'store']);

                Route::get('login', [AuthenticatedSessionController::class, 'create'])
                            ->name('login');

                Route::post('login', [AuthenticatedSessionController::class, 'store']);

                Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                            ->name('password.request');

                Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                            ->name('password.email');

                Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                            ->name('password.reset');

                Route::post('reset-password', [NewPasswordController::class, 'store'])
                            ->name('password.store');
            });

            Route::middleware('auth')->group(function () {
                Route::get('verify-email', EmailVerificationPromptController::class)
                            ->name('verification.notice');

                Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                            ->middleware(['signed', 'throttle:6,1'])
                            ->name('verification.verify');

                Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                            ->middleware('throttle:6,1')
                            ->name('verification.send');

                Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                            ->name('password.confirm');

                Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

                Route::put('password', [PasswordController::class, 'update'])->name('password.update');

                Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                            ->name('logout');
            });


            Route::middleware('auth')->group(function () {
                Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
                Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
                Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
            });

    ```

- 15- Déplacer le fichier ```auth.php``` dans le repertoire suivant ```routes/web/```
- 16- Vider le contenu du fichier web.php par :
    ``` 
        <?php

        use Illuminate\Support\Facades\Route;


        Route::middleware('auth')->group(function () {
            Route::get('/', function(){
                return view('index');
            });
        });

        foreach(File::allFiles(__DIR__.'/web') as $route_file){
            require $route_file->getPathname();
        }
    ```
- 15- Actualiser les informations de l'application
    ```
        php artisan migrate
        php artisan config:clear
        php artisan cache:clear
        php artisan route:clear
    ```
- 13- Vérifier si la route est disponible dans votre projet avec la commande suivante : ```php artisan route:list```

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
| **Requests**  | `app/Http/Requests/Sdisauth/` |


### **Deuxième Installation**

Une commande qui fait tout le travail pour vous, l'installation et la publication des fichiers
- 1- 
    ```
        php artisan sdisauth:install
    ```
    ou

    ```
        
        php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
        php artisan vendor:publish --provider="Sdisauth\AuthServiceProvider"

    ```
- 2- Créer un fichier authentificationRoutes.php dans ```routes/web/..```
    ```
        <?php

            use App\Http\Controllers\Auth\AuthenticatedSessionController;
            use App\Http\Controllers\Auth\ConfirmablePasswordController;
            use App\Http\Controllers\Auth\EmailVerificationNotificationController;
            use App\Http\Controllers\Auth\EmailVerificationPromptController;
            use App\Http\Controllers\Auth\NewPasswordController;
            use App\Http\Controllers\Auth\PasswordController;
            use App\Http\Controllers\Auth\PasswordResetLinkController;
            use App\Http\Controllers\Auth\RegisteredUserController;
            use App\Http\Controllers\Auth\VerifyEmailController;
            use App\Http\Controllers\ProfileController;
            use Illuminate\Support\Facades\Route;

            Route::get('/', [AuthenticatedSessionController::class, 'create']);

            Route::middleware('guest')->group(function () {
                Route::get('register', [RegisteredUserController::class, 'create'])
                            ->name('register');

                Route::post('register', [RegisteredUserController::class, 'store']);

                Route::get('login', [AuthenticatedSessionController::class, 'create'])
                            ->name('login');

                Route::post('login', [AuthenticatedSessionController::class, 'store']);

                Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                            ->name('password.request');

                Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                            ->name('password.email');

                Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                            ->name('password.reset');

                Route::post('reset-password', [NewPasswordController::class, 'store'])
                            ->name('password.store');
            });

            Route::middleware('auth')->group(function () {
                Route::get('verify-email', EmailVerificationPromptController::class)
                            ->name('verification.notice');

                Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                            ->middleware(['signed', 'throttle:6,1'])
                            ->name('verification.verify');

                Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                            ->middleware('throttle:6,1')
                            ->name('verification.send');

                Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                            ->name('password.confirm');

                Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

                Route::put('password', [PasswordController::class, 'update'])->name('password.update');

                Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                            ->name('logout');
            });


            Route::middleware('auth')->group(function () {
                Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
                Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
                Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
            });

    ```

- 3- Déplacer le fichier ```auth.php``` dans le repertoire suivant ```routes/web/```

- 4-
    ```
        php artisan migrate
        php artisan config:clear
        php artisan cache:clear
        php artisan route:clear
    ```

- 5- Vérifier si la route est disponible dans votre projet avec la commande suivante :      ```php artisan route:list```


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


## Auteur

Développé par [FPM-SDIS](https://github.com/fpmsdis)  
👤 GitHub: [@fpmsdis](https://github.com/fpmsdis)
