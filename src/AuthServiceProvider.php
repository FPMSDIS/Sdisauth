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
    }

    public function boot()
    {   
        $this->registerRoutes();
        
        Log::info("Boot method called in AuthServiceProvider.");

        // Supprimer les anciennes vues avant de publier
        $viewsPath = resource_path('views');
        // if (File::exists($viewsPath)) {
        //     $files = File::files($viewsPath);

        //     foreach ($files as $file) {
        //         if ($file->getFilename() !== 'welcome.blade.php' 
        //                 && $file->getFilename() !== 'dashboard.blade.php'
        //                 && $file->getFilename() !== 'index.blade.php') {
        //             File::delete($file->getPathname()); 
        //         }
        //     }
        // }

        $packageViews = __DIR__.'/resources/views';
        $appViews = resource_path('views');
        // $this->deleteOldViews($packageViews, $appViews);
        $this->publishes([
            $packageViews => $appViews,
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

        /**
     * Supprime les anciens fichiers/dossiers de vues avant publication.
     */
    protected function deleteOldViews(string $source, string $destination)
    {
        if (!file_exists($destination)) {
            return;
        }

        $items = scandir($source);

        foreach ($items as $item) {
            if ($item === '.' || $item === '..') {
                continue;
            }

            $sourceItem = $source . DIRECTORY_SEPARATOR . $item;
            $destItem = $destination . DIRECTORY_SEPARATOR . $item;

            if (is_dir($sourceItem)) {
                // Supprimer le dossier correspondant dans l'application Laravel
                $this->deleteDirectory($destItem);
            } elseif (file_exists($destItem)) {
                // Supprimer le fichier correspondant
                unlink($destItem);
            }
        }
    }

    /**
     * Supprime récursivement un dossier.
     */
    protected function deleteDirectory(string $dir)
    {
        if (!is_dir($dir)) {
            return;
        }

        $files = array_diff(scandir($dir), ['.', '..']);

        foreach ($files as $file) {
            $filePath = $dir . DIRECTORY_SEPARATOR . $file;
            is_dir($filePath) ? $this->deleteDirectory($filePath) : unlink($filePath);
        }

        rmdir($dir);
    }

}