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
        Schema::create('posgrado_asignaciones_docentes', function (Blueprint $table) {
            $table->id('id_posgrado_asignacion_docente');
            $table->unsignedBigInteger('id_persona_docente');
            $table->unsignedBigInteger('id_posgrado_materia');
            $table->unsignedBigInteger('id_posgrado_tipo_evaluacion_nota')->default(0);
            $table->unsignedBigInteger('id_gestion_periodo');
            $table->string('tipo_calificacion', 3)->default('N');
            $table->string('grupo', 3)->nullable();
            $table->integer('cupo_maximo_estudiante')->default(0);
            $table->char('finaliza_planilla_calificacion', 1)->default('N');
            $table->timestamp('fecha_limite_examen_final')->nullable();
            $table->timestamp('fecha_limite_nota_2da_instancia')->nullable();
            $table->timestamp('fecha_limite_nota_examen_mesa')->nullable();
            $table->timestamp('fecha_finalizacion_planilla')->default(now());
            $table->string('hash', 500)->nullable();
            $table->string('codigo_barras', 500)->nullable();
            $table->string('codigo_qr', 500)->nullable();
            $table->char('estado', 1)->default('S');
            $table->timestamps();

            // Llaves foráneas
            $table->foreign('id_persona_docente')->references('id_persona_docente')->on('personas_docentes');
            $table->foreign('id_posgrado_materia')->references('id_posgrado_materia')->on('posgrado_materias');
            $table->foreign('id_posgrado_tipo_evaluacion_nota')->references('id_posgrado_tipo_evaluacion_nota')->on('posgrado_tipos_evaluaciones_notas');
            $table->foreign('id_gestion_periodo')->references('id_gestion_periodo')->on('gestiones_periodos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posgrado_asignaciones_docentes');
    }
};
