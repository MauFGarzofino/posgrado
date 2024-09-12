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
        Schema::create('gestiones_periodos', function (Blueprint $table) {
            $table->id('id_gestion_periodo');
            $table->integer('gestion');
            $table->integer('periodo');
            $table->char('tipo', 1); // A=Anual, S=Semestral
            $table->char('estado', 1)->default('S');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gestiones_periodos');
    }
};
