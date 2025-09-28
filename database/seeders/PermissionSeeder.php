<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $permissions  = [
            'manage_dashboard',
            'manage_users',
            'manage_roles',
            'manage_permissions',
            'manage_tickets',
            'view_reports',
        ];

        foreach ($permissions as $pemission) {
            Permission::create(['name' => $pemission]);
        }
    }
}
