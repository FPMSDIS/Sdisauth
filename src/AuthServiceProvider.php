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

        $this->publishWithOverwrite([
            __DIR__.'/resources/views' => resource_path('views'),
            // __DIR__.'/database/migrations' => database_path('migrations'),
            __DIR__.'/database/seeders' => database_path('seeders'),
            __DIR__.'/config/sdisauth.php' => config_path('sdisauth.php'),
            // __DIR__.'/public' => public_path(),
            __DIR__.'/routes/web' => base_path('routes/web'),
            __DIR__.'/Models' => app_path('Models'),
            // __DIR__.'/Http/Controllers' => app_path('Http/Controllers/Sdisauth'),
            // __DIR__.'/Http/Requests' => app_path('Http/Requests/Sdisauth'),
        ]);
    }

    /**
     * Publie les fichiers en écrasant les existants.
     */
    protected function publishWithOverwrite(array $paths)
    {
        foreach ($paths as $from => $to) {
            $this->deleteExisting($to);
            $this->publishes([$from => $to], 'sdisauth', true);
        }
    }

    /**
     * Supprime les fichiers et dossiers existants avant la publication.
     */
    protected function deleteExisting($path)
    {
        if (File::exists($path)) {
            File::isDirectory($path) ? File::deleteDirectory($path) : File::delete($path);
        }
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
