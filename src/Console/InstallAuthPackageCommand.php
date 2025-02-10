<?php 

namespace Sdisauth\Console;

use Illuminate\Console\Command;

class InstallAuthPackageCommand extends Command
{
    protected $signature = 'sdisauth:install';
    protected $description = 'Installe Laravel Breeze et configure Laravel Permission';

    public function handle()
    {
       
        $this->info('Début de l\'installation et de la publication des ressources pour Sdisauth.');
        
        if ($this->confirm('Souhaitez-vous installer Laravel Breeze ?')) {
            $this->info('++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++');
            $this->info('+++++++++++++++++++Installation de Laravel Breeze +++++++++++++++');
            $this->info('++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++');
            exec('composer require laravel/breeze --dev', $output, $status);
            if ($status === 0) {
                $this->info('Laravel Breeze installé avec succès.');//ok
            } else {
                $this->error('Erreur lors de l\'installation de Laravel Breeze.');
            }

            exec('php artisan breeze:install', $output, $status);
            if ($status === 0) {
                $this->info('Laravel Breeze configuré avec succès.');
            } else {
                $this->error('Erreur lors de la configuration de Laravel Breeze.');
            }
        }

        // Installer Laravel Permission
        if ($this->confirm('Souhaitez-vous installer Spatie Laravel Permission ?')) {
            $this->info('++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++');
            $this->info('+++++++++++++++Installation de Laravel Permission +++++++++++++++');
            $this->info('++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++');
            
            exec('composer require spatie/laravel-permission', $output, $status);
            if ($status === 0) {
                $this->info('Spatie Laravel Permission installé avec succès.');//ok
            } else {
                $this->error('Erreur lors de l\'installation de Spatie Laravel Permission.');
            }

            exec('php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"', $output, $status);
            if ($status === 0) {
                $this->info('Fichiers de configuration de Laravel Permission publiés avec succès.');//ok
            } else {
                $this->error('Erreur lors de la publication des fichiers de Laravel Permission.');
            }

        }

        if ($this->confirm('Souhaitez-vous publier les vues ?')) {
            $this->info('++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++');
            $this->info('+++++++++++++++++++Publication des vues...+++++++++++++++');
            $this->info('++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++');
            $this->call('vendor:publish', ['--tag' => 'sdisauth']);
        }

        if ($this->confirm('Souhaitez-vous publier les migrations ?')) {
            $this->info('++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++');
            $this->info('+++++++++++++++++++Publication des migrations...+++++++++++++++');
            $this->info('++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++');
            $this->call('vendor:publish', ['--tag' => 'sdisauth-migrations']);
        }

        if ($this->confirm('Souhaitez-vous publier les seeders ?')) {
            $this->info('++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++');
            $this->info('+++++++++++++++++++Publication des seeders...+++++++++++++++');
            $this->info('++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++');
            $this->call('vendor:publish', ['--tag' => 'sdisauth-seeders']);
        }

        if ($this->confirm('Souhaitez-vous publier la configuration ?')) {
            $this->info('++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++');
            $this->info('+++++++++++++++++++Publication de la configuration...+++++++++++++++');
            $this->info('++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++');
            $this->call('vendor:publish', ['--tag' => 'config']);
        }

        if ($this->confirm('Souhaitez-vous publier les assets ?')) {
            $this->info('++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++');
            $this->info('+++++++++++++++++++Publication des assets...+++++++++++++++');
            $this->info('++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++');
            $this->call('vendor:publish', ['--tag' => 'sdisauth-assets']);
        }

        if ($this->confirm('Souhaitez-vous publier les routes ?')) {
            $this->info('++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++');
            $this->info('+++++++++++++++++++Publication des routes...+++++++++++++++');
            $this->info('++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++');
            $this->call('vendor:publish', ['--tag' => 'sdisauth-routes']);
            exec('php artisan migrate', $output, $status);
            if ($status === 0) {
                $this->info('Migration effectuée avec succès.');
            } else {
                $this->error('Erreur lors de l\'exécution de la migration.');
            }
        }

        $this->info('Installation terminée ✅🏆FPM DEV TEAM => SDIS🏆');
    }
}