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
        //
        
    }

    
}