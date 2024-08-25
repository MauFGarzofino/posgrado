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
        Schema::create('menus', function (Blueprint $table) {
            $table->id('id_menu'); // SERIAL NOT NULL
            $table->foreignId('id_menu_principal') // INT NOT NULL
            ->constrained('menus-principales', 'id_menu_principal')
                ->onDelete('cascade'); // ForeignKey reference to menus-principales
            $table->string('nombre', 250);
            $table->string('directorio', 350);
            $table->string('icono', 70)->nullable();
            $table->string('imagen', 150)->nullable();
            $table->string('color', 25)->nullable();
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
        Schema::dropIfExists('menus');
    }
};
