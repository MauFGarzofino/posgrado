<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('emision_cedulas', function (Blueprint $table) {
            $table->id('id_emision_cedula');
            $table->string('nombre', 15);
            $table->string('descripcion', 45)->nullable();
            $table->string('estado', 1)->default('S');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('emision_cedulas');
    }
};
