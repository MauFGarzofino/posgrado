<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('provincias', function (Blueprint $table) {
            $table->id('id_provincia');
            $table->unsignedBigInteger('id_departamento');
            $table->string('nombre', 40);
            $table->string('estado', 1)->default('S');
            $table->timestamps();

            // Relación con departamentos
            $table->foreign('id_departamento')->references('id_departamento')->on('departamentos');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('provincias');
    }
};
