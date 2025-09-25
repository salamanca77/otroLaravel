<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $controlVehicular = Role::create([
        'name' => 'controlVehicular'
        ]);

       $controlVehicular->syncPermissions([
        'manage_tickets',
       ]);

       $admin = Role::create([
        'name' => 'admin'
        ]);

       $admin->syncPermissions([
        'access_admin_panel',
        'manage_users',
        'manage_roles',
        'view_reports',
       ]);

       $user = User::find(1);

        $user->assignRole([
            'controlVehicular',
            'admin'
        ]);
    }
}


















