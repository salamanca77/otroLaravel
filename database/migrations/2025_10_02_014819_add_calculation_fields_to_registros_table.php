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
            $table->integer('tiempo_de_estancia')->nullable()->after('hora_salida'); // En minutos
            $table->decimal('monto_a_pagar', 8, 2)->nullable()->after('tiempo_de_estancia');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('registros', function (Blueprint $table) {
            $table->dropColumn(['tiempo_de_estancia', 'monto_a_pagar']);
        });
    }
};
