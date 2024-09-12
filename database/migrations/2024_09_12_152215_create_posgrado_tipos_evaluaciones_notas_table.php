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
        Schema::create('posgrado_tipos_evaluaciones_notas', function (Blueprint $table) {
            $table->id('id_posgrado_tipo_evaluacion_nota');
            $table->string('nombre', 3);
            $table->json('configuracion');
            $table->integer('nota_minima_aprobacion')->nullable(); // Valor mínimo de aprobación
            $table->char('estado', 1)->default('S');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posgrado_tipos_evaluaciones_notas');
    }
};
