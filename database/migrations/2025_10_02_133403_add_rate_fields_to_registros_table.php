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
        Schema::table('registros', function (Blueprint $table) {
            $table->string('tipo_tarifa')->nullable()->after('monto_a_pagar');
            $table->decimal('tarifa', 8, 2)->nullable()->after('tipo_tarifa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('registros', function (Blueprint $table) {
            $table->dropColumn(['tipo_tarifa', 'tarifa']);
        });
    }
};