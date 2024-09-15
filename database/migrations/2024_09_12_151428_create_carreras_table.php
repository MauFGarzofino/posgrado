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
        Schema::create('carreras', function (Blueprint $table) {
            $table->id('id_carrera');
            $table->unsignedBigInteger('id_facultad');
            $table->unsignedBigInteger('id_modalidad');
            $table->unsignedBigInteger('id_carrera_nivel_academico');
            $table->unsignedBigInteger('id_sede');
            $table->string('nombre', 50);
            $table->string('nombre_abreviado', 50)->nullable();
            $table->date('fecha_aprobacion_curriculo')->nullable();
            $table->date('fecha_creacion')->nullable();
            $table->string('resolucion', 255)->nullable();
            $table->string('direccion', 150)->nullable();
            $table->string('latitud', 50)->nullable();
            $table->string('longitud', 50)->nullable();
            $table->string('fax', 20)->nullable();
            $table->string('telefono', 20)->nullable();
            $table->string('telefono_interno', 100)->nullable();
            $table->string('casilla', 12)->nullable();
            $table->string('email', 30)->nullable();
            $table->string('sitio_web', 50)->nullable();
            $table->char('estado', 1)->default('S');
            $table->timestamps();

            // Definir las llaves foráneas
            $table->foreign('id_facultad')->references('id_facultad')->on('facultades');
            $table->foreign('id_modalidad')->references('id_modalidad')->on('modalidades');
            $table->foreign('id_carrera_nivel_academico')->references('id_carrera_nivel_academico')->on('carreras_niveles_academicos');
            $table->foreign('id_sede')->references('id_sede')->on('sedes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carreras');
    }
};
