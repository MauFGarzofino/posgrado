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
        Schema::create('personas_docentes', function (Blueprint $table) {
            $table->id('id_persona_docente');
            $table->foreignId('id_persona')->constrained('personas', 'id_persona')->onDelete('cascade'); // Relación con la tabla personas
            $table->date('fecha_ingreso');
            $table->date('fecha')->default(now());
            $table->char('estado', 1)->default('S');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas_docentes');
    }
};
