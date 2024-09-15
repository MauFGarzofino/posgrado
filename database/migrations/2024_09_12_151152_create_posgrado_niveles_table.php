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
        Schema::create('posgrado_niveles', function (Blueprint $table) {
            $table->id('id_posgrado_nivel');
            $table->string('nombre', 100);
            $table->string('descripcion', 100)->nullable();
            $table->char('estado', 1)->default('S');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posgrado_niveles');
    }
};
