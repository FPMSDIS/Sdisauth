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

        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes/web/userRolePermission.php');
    }

    public function boot()
    {   
        $this->registerRoutes();//ok plus de problème
        
        Log::info("Boot method called in AuthServiceProvider.");


        $this->loadViewsFrom(__DIR__.'/resources/views', 'sdisauth');

        $this->publishes([
            __DIR__.'/resources/views' => resource_path('views/vendor/sdisauth'),
        ], 'sdisauth');

        $this->publishes([
            __DIR__.'/database/seeders' => database_path('seeders'),
        ], 'sdisauth');

        // Publication des migrations
        $this->publishes([
            __DIR__.'/database/migrations' => database_path('migrations'),
        ], 'sdisauth-migrations');

        $this->publishes([
            __DIR__.'/config/sdisauth.php' => config_path('sdisauth.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/public' => public_path('vendor/sdisauth'),
        ], 'sdisauth-assets');

        $this->publishes([
            __DIR__.'/routes/web' => base_path('routes/vendor/sdisauth/web'),
        ], 'sdisauth-routes');
        
        
    }

    // protected function registerRoutes()
    // {
    //     if (!$this->app->routesAreCached()) {
    //         require __DIR__.'/routes/userRolePermission.php';
    //     }
    // }
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