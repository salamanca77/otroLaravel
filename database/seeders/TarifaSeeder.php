<?php

namespace Database\Seeders;

use App\Models\Tarifa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TarifaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tarifa::updateOrCreate(
            ['id' => 1],
            [
                'tarifa' => 0.25, 
                'tipo_tarifa' => 'minuto'
            ]
        );
    }
}