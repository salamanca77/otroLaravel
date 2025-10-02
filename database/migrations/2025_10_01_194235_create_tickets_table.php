<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('placa_vehiculo', 10);
            $table->date('fecha_entrada');
            $table->time('hora_entrada');
            $table->date('fecha_salida')->nullable();
            $table->time('hora_salida')->nullable();
            $table->decimal('tarifa_por_minuto', 8, 2)->default(0.25);
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
