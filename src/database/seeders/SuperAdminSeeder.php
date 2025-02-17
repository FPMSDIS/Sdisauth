<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SuperAdminSeeder extends Seeder
{
    public function run()
    {
        // Vérifier si le rôle "superadmin" existe, sinon le créer
        $superAdminRole = Role::firstOrCreate(
            ['name' => 'superadmin', 'guard_name' => 'web'],
            ['slug' => Str::slug('superadmin')]
        );
        $adminRole = Role::firstOrCreate(
            ['name' => 'admin', 'guard_name' => 'web'],
            ['slug' => Str::slug('admin')]
        );

        // Assigner toutes les permissions au rôle superadmin
        $superAdminRole->syncPermissions(Permission::all());
        $adminRole->syncPermissions(Permission::all());

        // Vérifier si l'utilisateur superadmin existe, sinon le créer
        $superAdmin = User::firstOrCreate(
            ['email' => 'superadmin@fpmnet.ci'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
            ]
        );
        $admin = User::firstOrCreate(
            ['email' => 'admin@fpmnet.ci'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
            ]
        );

        // Assigner le rôle superadmin à l'utilisateur
        if (!$superAdmin->hasRole('superadmin')) {
            $superAdmin->assignRole('superadmin');
        }
        if (!$admin->hasRole('admin')) {
            $admin->assignRole('admin');
        }
    }
}
