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
        Schema::create('facultades', function (Blueprint $table) {
            $table->id('id_facultad'); // Equivale a SERIAL NOT NULL
            $table->foreignId('id_area') // Equivale a INT NOT NULL
            ->constrained('areas', 'id_area') // Especifica la columna de referencia
            ->onDelete('cascade'); // Configura la FK
            $table->string('nombre', 100);
            $table->string('nombre_abreviado', 50)->nullable();
            $table->string('direccion', 100)->nullable();
            $table->string('telefono', 100)->nullable();
            $table->string('telefono_interno', 100)->nullable();
            $table->string('fax', 20)->nullable();
            $table->string('email', 30)->nullable();
            $table->string('latitud', 25)->nullable();
            $table->string('longitud', 25)->nullable();
            $table->date('fecha_creacion')->nullable();
            $table->string('escudo', 60)->nullable();
            $table->string('imagen', 60)->nullable();
            $table->char('estado_virtual', 1)->nullable();
            $table->char('estado', 1)->default('S');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facultades');
    }
};
