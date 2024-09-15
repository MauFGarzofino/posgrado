<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id('id_persona');
            $table->unsignedBigInteger('id_localidad');
            $table->string('numero_identificacion_personal', 15);
            $table->unsignedBigInteger('id_emision_cedula');
            $table->string('paterno', 20);
            $table->string('materno', 20)->nullable();
            $table->string('nombres', 65);
            $table->unsignedBigInteger('id_sexo');
            $table->unsignedBigInteger('id_grupo_sanguineo');
            $table->date('fecha_nacimiento')->nullable();
            $table->string('direccion', 60)->nullable();
            $table->string('latitud', 30)->nullable();
            $table->string('longitud', 30)->nullable();
            $table->string('telefono_celular', 12)->nullable();
            $table->string('telefono_fijo', 12)->nullable();
            $table->string('zona', 50)->nullable();
            $table->unsignedBigInteger('id_estado_civil');
            $table->string('email', 50)->nullable();
            $table->string('fotografia', 255)->default('default.jpg');
            $table->string('usuario', 255)->nullable();
            $table->string('password', 255)->nullable();
            $table->string('abreviacion_titulo', 10)->nullable();
            $table->string('estado', 1)->default('S');
            $table->timestamps();

            // Relaciones con otras tablas
            $table->foreign('id_localidad')->references('id_localidad')->on('localidades');
            $table->foreign('id_emision_cedula')->references('id_emision_cedula')->on('emision_cedulas');
            $table->foreign('id_sexo')->references('id_sexo')->on('sexos');
            $table->foreign('id_grupo_sanguineo')->references('id_grupo_sanguineo')->on('grupos_sanguineos');
            $table->foreign('id_estado_civil')->references('id_estado_civil')->on('estados_civiles');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
