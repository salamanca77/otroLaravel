<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $user =  User::create([
            'name' => 'Jonn Oliver Salamanca',
            'email' => 'joliversalamanca@gmail.com',
            // 'password' => Crypt::encrypt('12345678')
            'password' => bcrypt('12345678')
        ]);
    }
}
