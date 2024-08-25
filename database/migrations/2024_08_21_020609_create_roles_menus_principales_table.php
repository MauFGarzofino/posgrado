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
        Schema::create('roles_menus_principales', function (Blueprint $table) {
            $table->id('id_rol_menu_principal'); // SERIAL NOT NULL
            $table->foreignId('id_rol') // INT NOT NULL
            ->constrained('roles', 'id_rol')
                ->onDelete('cascade'); // ForeignKey reference to roles
            $table->foreignId('id_menu_principal') // INT NOT NULL
            ->constrained('menus-principales', 'id_menu_principal')
                ->onDelete('cascade'); // ForeignKey reference to menus-principales
            $table->char('estado', 1)->default('S');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles_menus_principales');
    }
};
