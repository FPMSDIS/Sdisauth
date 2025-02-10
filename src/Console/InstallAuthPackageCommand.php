<?php 

namespace Sdisauth\Console;

use Illuminate\Console\Command;

class InstallAuthPackageCommand extends Command
{
    protected $signature = 'sdisauth:install';
    protected $description = 'Installe Laravel Breeze et configure Laravel Permission';

    public function handle()
    {
       

        // exec('composer require laravel/breeze --dev');
        // $this->call('breeze:install', ['blade']);

        // Installer Laravel Breeze
        if ($this->confirm('Souhaitez-vous installer Laravel Breeze ?')) {
            $this->info('++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++');
            $this->info('+++++++++++++++++++Installation de Laravel Breeze +++++++++++++++');
            $this->info('++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++');
            $this->call('composer require laravel/breeze --dev');
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
        

        // exec('composer require spatie/laravel-permission');
        // $this->call('artisan', ['vendor:publish', '--provider' => 'Spatie\Permission\PermissionServiceProvider']);
        // $this->call('artisan', ['migrate']);


        $this->info('Installation terminée ✅🏆FPM DEV TEAM => SDIS🏆');
    }
}