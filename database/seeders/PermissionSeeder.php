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
            'manage_tickets',
            'access_admin_panel',
            'manage_users',
            'manage_roles',
            'view_reports',
        ];    
        
        foreach ($permissions as $pemissioin) {
            Permission::create([
                'name' => $pemissioin
                ]);
        }
    }
}
