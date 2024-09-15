<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('grupos_sanguineos', function (Blueprint $table) {
            $table->id('id_grupo_sanguineo');
            $table->string('nombre', 15);
            $table->string('estado', 1)->default('S');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('grupos_sanguineos');
    }
};
