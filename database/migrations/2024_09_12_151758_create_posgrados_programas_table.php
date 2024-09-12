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
        Schema::create('posgrados_programas', function (Blueprint $table) {
            $table->id('id_posgrado_programa');
            $table->unsignedBigInteger('id_nivel_academico');
            $table->unsignedBigInteger('id_carrera');
            $table->integer('gestion')->nullable();
            $table->string('nombre', 100);
            $table->unsignedBigInteger('id_modalidad');
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->date('fecha_inicio_inscrito')->nullable();
            $table->date('fecha_fin_inscrito')->nullable();
            $table->integer('numero_max_cuotas')->nullable();
            $table->string('documento', 500)->nullable();
            $table->float('costo_total')->nullable();
            $table->text('formato_contrato')->nullable();
            $table->text('formato_contrato_docente')->nullable();
            $table->char('estado', 1)->default('S');
            $table->timestamps();

            // Definir las llaves foráneas
            $table->foreign('id_nivel_academico')->references('id_nivel_academico')->on('niveles_academicos');
            $table->foreign('id_carrera')->references('id_carrera')->on('carreras');
            $table->foreign('id_modalidad')->references('id_modalidad')->on('modalidades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posgrados_programas');
    }
};
