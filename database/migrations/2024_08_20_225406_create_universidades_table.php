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
        Schema::create('universidades', function (Blueprint $table) {
            $table->id('id_universidad');
            $table->string('nombre', 150);
            $table->string('nombre_abreviado', 100)->nullable();
            $table->string('inicial', 50)->nullable();
            $table->char('estado', 1)->default('S');
            $table->primary('id_universidad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universidades');
    }
};
