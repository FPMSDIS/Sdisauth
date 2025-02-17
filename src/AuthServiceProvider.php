<?php

namespace Sdisauth;

use Sdisauth\Console\InstallAuthPackageCommand;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;

class AuthServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->commands([
            InstallAuthPackageCommand::class,
        ]);
    }

    public function boot()
    {   
        $this->registerRoutes();

        // $this->publishWithOverwrite([
        //     __DIR__.'/resources/views' => resource_path('views'),
        //     __DIR__.'/database/seeders' => database_path('seeders'),
        //     __DIR__.'/config/sdisauth.php' => config_path('sdisauth.php'),
        //     // __DIR__.'/public' => public_path(),
        //     __DIR__.'/routes/web' => base_path('routes/web'),
        //     __DIR__.'/Models' => app_path('Models'),
        // ]);

        $this->publishes([
            __DIR__.'/resources/views' => resource_path('views'),
            __DIR__.'/database/migrations' => database_path('migrations'),
            __DIR__.'/database/seeders' => database_path('seeders'),
            __DIR__.'/config/sdisauth.php' => config_path('sdisauth.php'),
            __DIR__.'/routes/web' => base_path('routes/web'), // Uniquement le fichier web.php
            __DIR__.'/Models' => app_path('Models'),
            __DIR__.'/Http/Controllers' => app_path('Http/Controllers/Sdisauth'),
            __DIR__.'/Http/Requests' => app_path('Http/Requests/Sdisauth'),
            __DIR__.'/public' => public_path(),
        ], 'sdisauth');
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
