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
        Schema::create('posgrado_materias', function (Blueprint $table) {
            $table->id('id_posgrado_materia');
            $table->unsignedBigInteger('id_posgrado_programa');
            $table->unsignedBigInteger('id_posgrado_nivel');
            $table->string('sigla', 6);
            $table->string('nombre', 100);
            $table->integer('nivel_curso')->nullable();
            $table->integer('cantidad_hora_teorica')->default(0);
            $table->integer('cantidad_hora_practica')->default(0);
            $table->integer('cantidad_hora_laboratorio')->default(0);
            $table->integer('cantidad_hora_plataforma')->default(0);
            $table->integer('cantidad_hora_virtual')->default(0);
            $table->integer('cantidad_credito')->default(0);
            $table->string('color', 7)->default('#000000');
            $table->string('icono', 35)->nullable();
            $table->string('imagen', 250)->nullable();
            $table->char('estado', 1)->default('S');
            $table->timestamps();

            // Llaves foráneas
            $table->foreign('id_posgrado_programa')->references('id_posgrado_programa')->on('posgrados_programas');
            $table->foreign('id_posgrado_nivel')->references('id_posgrado_nivel')->on('posgrado_niveles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posgrado_materias');
    }
};
