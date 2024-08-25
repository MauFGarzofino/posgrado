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
        Schema::create('configuraciones', function (Blueprint $table) {
            $table->id('id_configuracion'); // Equivale a SERIAL NOT NULL
            $table->foreignId('id_universidad') // Equivale a INT NOT NULL
            ->constrained('universidades', 'id_universidad') // Especifica la columna de referencia
            ->onDelete('cascade'); // Configura la FK
            $table->string('tipo', 200);
            $table->string('descripcion', 500)->nullable();
            $table->char('estado', 1)->default('S');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configuraciones');
    }
};
