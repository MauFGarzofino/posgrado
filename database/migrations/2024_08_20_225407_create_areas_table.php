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
        Schema::create('areas', function (Blueprint $table) {
            $table->id('id_area'); // Equivale a SERIAL NOT NULL
            $table->foreignId('id_universidad') // Equivale a INT NOT NULL
            ->constrained('universidades', 'id_universidad') // Especifica la columna de referencia
            ->onDelete('cascade'); // Configura la FK
            $table->string('nombre', 150);
            $table->string('nombre_abreviado', 100)->nullable();
            $table->char('estado', 1)->default('S');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('areas');
    }
};
