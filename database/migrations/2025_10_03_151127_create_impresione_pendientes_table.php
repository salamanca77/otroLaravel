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
        Schema::create('impresione_pendientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('registro_id');
            $table->foreign('registro_id')->references('id')->on('registros')->onDelete('cascade');

            $table->string('estado')->default('pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('impresione_pendientes');
    }
};
