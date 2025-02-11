<?php 
namespace Sdisauth\Console;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class InstallAuthPackageCommand extends Command
{
    protected $signature = 'sdisauth:install';
    protected $description = 'Installe Laravel Breeze et configure Laravel Permission';

    public function handle()
    {
        $this->info('🚀 Début de l\'installation de Sdisauth.');

        // Installation de Laravel Breeze
        if ($this->confirm('Souhaitez-vous installer Laravel Breeze ?')) {
            $this->installBreeze();
        }

        // Installation de Laravel Permission
        if ($this->confirm('Souhaitez-vous installer Spatie Laravel Permission ?')) {
            $this->installLaravelPermission();
        }

        // Publication des ressources
        $this->publishResources('vues', 'sdisauth');
        $this->publishResources('contrôleurs', 'sdisauth-controllers');
        $this->publishResources('migrations', 'sdisauth-migrations');
        $this->publishResources('configuration', 'config');
        $this->publishResources('assets', 'sdisauth-assets');
        $this->publishResources('routes', 'sdisauth-routes');

        // Exécution des migrations
        $this->info('🔄 Lancement des migrations...');
        $this->call('migrate');
        $this->info('✅ Migration effectuée avec succès.');
        $this->info('🏆 Installation terminée avec succès ! - FPM DEV TEAM');
        
    }

    private function installBreeze()
    {
        $this->info('🔹 Installation de Laravel Breeze...');
        
        if (!$this->runCommand(['composer', 'require', 'laravel/breeze', '--dev'])) {
            return;
        }
        
        $this->info('✅ Laravel Breeze installé avec succès.');
        
        // Installation de Breeze avec Blade
        if (!$this->runCommand(['php', 'artisan', 'breeze:install', '--force', '--stack=blade'])) {
            return;
        }

        $this->info('✅ Laravel Breeze configuré avec succès.');
    }

    private function installLaravelPermission()
    {
        $this->info('🔹 Installation de Laravel Permission...');
        
        // Installation et publication des fichiers
        if (!$this->runCommand(['php', 'artisan', 'vendor:publish', '--provider=Spatie\Permission\PermissionServiceProvider'])) {
            return;
        }

        $this->info('✅ Laravel Permission installé avec succès.');
    }

    private function publishResources($type, $tag)
    {
        if ($this->confirm("Souhaitez-vous publier les {$type} ?")) {
            $this->info("🔹 Publication des {$type}...");
            $this->call('vendor:publish', ['--tag' => $tag]);
            $this->info("✅ Publication des {$type} terminée.");
        }
    }

    private function runCommand(array $command)
    {
        $process = new Process($command);
        $process->setTimeout(300); // 5 minutes max
        $process->run(function ($type, $buffer) {
            echo $buffer;
        });

        if (!$process->isSuccessful()) {
            $this->error('❌ Erreur : ' . $process->getErrorOutput());
            return false;
        }

        return true;
    }
}
