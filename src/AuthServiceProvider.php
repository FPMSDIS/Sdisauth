<?php

namespace Sdisauth;

use Sdisauth\Console\InstallAuthPackageCommand;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Log;

class AuthServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->commands([
            InstallAuthPackageCommand::class,
        ]);

        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }

    public function boot()
    {   
        $this->registerRoutes();
        
        // Log::info("Boot method called in AuthServiceProvider.");
        // if (class_exists(\Spatie\Permission\PermissionServiceProvider::class)){
        //     Log::info("avant route....");
        //     $this->loadRoutesFrom(__DIR__.'/routes/userRolePermission.php');
        //     Log::info("avant view");
        //     $this->loadViewsFrom(__DIR__.'/resources/views', 'sdisauth');
        //     Log::info("avant view pub");
        //     $this->publishes([
        //         __DIR__.'/resources/views' => resource_path('views/vendor/sdisauth'),
        //     ], 'sdisauth');
        //     Log::info("avant seeders");
        //     $this->publishes([
        //         __DIR__.'/database/seeders' => database_path('seeders'),
        //     ], 'sdisauth');
        //     Log::info("avant config");
        //     $this->publishes([
        //         __DIR__.'/config/sdisauth.php' => config_path('sdisauth.php'),
        //     ], 'config');
        //     Log::info("avant assets");
        //     $this->publishes([
        //         __DIR__.'/public' => public_path('vendor/sdisauth'),
        //     ], 'sdisauth-assets');
        // } else {
        //     Log::warning("Spatie Permission Service Provider is not available.");
        // }
        
    }

    protected function registerRoutes()
    {
        if (!$this->app->routesAreCached()) {
            require __DIR__.'/routes/userRolePermission.php';
        }
    }
}