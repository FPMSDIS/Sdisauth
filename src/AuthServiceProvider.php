<?php

namespace Sdisauth;

use Sdisauth\Console\InstallAuthPackageCommand;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

class AuthServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->commands([
            InstallAuthPackageCommand::class,
        ]);

        // $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes/web/userRolePermission.php');
    }

    public function boot()
    {   
        $this->registerRoutes();//ok plus de problème
        
        Log::info("Boot method called in AuthServiceProvider.");

        $this->loadRoutesFrom(__DIR__.'/routes/web/userRolePermission.php');

        // Supprimer les anciennes vues avant de publier
        $viewsPath = resource_path('views');
        if (File::exists($viewsPath)) {
            $files = File::files($viewsPath);

            foreach ($files as $file) {
                if ($file->getFilename() !== 'welcome.blade.php') {
                    File::delete($file->getPathname()); // Supprime les fichiers sauf welcome.blade.php
                }
            }
        }
        
        $this->publishes([
            __DIR__.'/resources/views' => resource_path('views'),
        ], 'sdisauth');

        $this->publishes([
            __DIR__.'/database/migrations' => database_path('migrations'),
        ], 'sdisauth-migrations');

        $this->publishes([
            __DIR__.'/config/sdisauth.php' => config_path('sdisauth.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/public' => public_path(),
        ], 'sdisauth-assets');

        $this->publishes([
            __DIR__.'/routes/web' => base_path('routes/web'),
        ], 'sdisauth-routes');
        
        $this->publishes([
            __DIR__.'/Http/Controllers' => app_path('Http/Controllers/Sdisauth'),
        ], 'sdisauth-controllers');

        $this->publishes([
            __DIR__.'/Http/Requests' => app_path('Http/Requests/Sdisauth'),
        ], 'sdisauth-requests');
        
    }

    protected function registerRoutes()
    {
        if (!$this->app->routesAreCached()) {
            $routeFiles = File::allFiles(__DIR__.'/routes/web');

            foreach ($routeFiles as $routeFile) {
                require $routeFile->getPathname();
            }
        }
    }

}