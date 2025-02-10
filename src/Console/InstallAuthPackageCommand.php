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
            $this->call('composer require laravel/breeze');
            $this->call('breeze:install', ['stack' => 'blade']);
        }

        // Installer Laravel Permission
        if ($this->confirm('Souhaitez-vous installer Spatie Laravel Permission ?')) {
            $this->info('++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++');
            $this->info('+++++++++++++++Installation de Laravel Permission +++++++++++++++');
            $this->info('++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++');
            $this->call('composer require spatie/laravel-permission');
            $this->call('vendor:publish', ['--provider' => 'Spatie\Permission\PermissionServiceProvider']);
            $this->call('migrate');
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
            $this->call('migrate');
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
        }

        $this->info('Installation terminée ✅🏆FPM DEV TEAM => SDIS🏆');
    }
}