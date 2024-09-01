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
        Schema::create('menus_principales', function (Blueprint $table) {
            $table->id('id_menu_principal');
            $table->foreignId('id_modulo')->constrained('modulos', 'id_modulo');
            $table->string('nombre', 250);
            $table->string('icono', 70)->nullable();
            $table->integer('orden')->nullable();
            $table->char('estado', 1)->default('S');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus_principales');
    }
};
