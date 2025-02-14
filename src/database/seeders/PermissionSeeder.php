<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            'voir_tableau_de_bord',
            'voir_gestion_des_utilisateurs',
            'voir_gestion_des_sms',
            'ajouter_permission',
            'modifier_permission',
            'lister_permission',
            'supprimer_permission',
            'ajouter_role',
            'modifier_role',
            'lister_role',
            'supprimer_role',
            'ajouter_utilisateur',
            'modifier_utilisateur',
            'lister_utilisateur',
            'supprimer_utilisateur',
            'lister_historique_des_achats'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission, 'guard_name' => 'web'],
                ['slug' => Str::slug($permission)]
            );
        }
    }
}
