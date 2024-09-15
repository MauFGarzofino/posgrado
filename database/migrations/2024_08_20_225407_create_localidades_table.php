<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('localidades', function (Blueprint $table) {
            $table->id('id_localidad');
            $table->unsignedBigInteger('id_provincia');
            $table->string('nombre', 40);
            $table->string('estado', 1)->default('S');
            $table->timestamps();

            // Relación con provincias
            $table->foreign('id_provincia')->references('id_provincia')->on('provincias');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('localidades');
    }
};
