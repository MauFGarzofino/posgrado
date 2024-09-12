<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            CREATE VIEW v_posgrado_asignaciones_docentes AS
            SELECT
                public.posgrado_asignaciones_docentes.id_posgrado_asignacion_docente,
                public.posgrado_asignaciones_docentes.id_persona_docente,
                public.posgrado_asignaciones_docentes.id_posgrado_materia,
                public.posgrado_asignaciones_docentes.id_posgrado_tipo_evaluacion_nota,
                public.posgrado_asignaciones_docentes.id_gestion_periodo,
                public.posgrado_asignaciones_docentes.tipo_calificacion,
                public.posgrado_asignaciones_docentes.grupo,
                public.posgrado_asignaciones_docentes.cupo_maximo_estudiante,
                public.posgrado_asignaciones_docentes.finaliza_planilla_calificacion,
                public.posgrado_asignaciones_docentes.fecha_limite_examen_final,
                public.posgrado_asignaciones_docentes.fecha_limite_nota_2da_instancia,
                public.posgrado_asignaciones_docentes.fecha_limite_nota_examen_mesa,
                public.posgrado_asignaciones_docentes.fecha_finalizacion_planilla,
                public.posgrado_asignaciones_docentes.hash,
                public.posgrado_asignaciones_docentes.codigo_barras,
                public.posgrado_asignaciones_docentes.codigo_qr,
                public.posgrado_asignaciones_docentes.estado,
                public.gestiones_periodos.gestion,
                public.gestiones_periodos.periodo,
                public.personas.id_persona,
                public.personas.ci AS numero_identificacion_personal,
                public.personas.apellidos,
                public.personas.nombres,
                public.personas.imagen AS persona_imagen, -- Alias para evitar conflicto
                public.posgrado_materias.id_posgrado_programa,
                public.posgrado_materias.id_posgrado_nivel,
                public.posgrado_materias.sigla,
                public.posgrado_materias.nombre AS nombre_materia,
                public.posgrado_materias.nivel_curso,
                public.posgrado_materias.cantidad_hora_teorica,
                public.posgrado_materias.cantidad_hora_practica,
                public.posgrado_materias.cantidad_hora_laboratorio,
                public.posgrado_materias.cantidad_hora_plataforma,
                public.posgrado_materias.cantidad_hora_virtual,
                public.posgrado_materias.cantidad_credito,
                public.posgrado_materias.color,
                public.posgrado_materias.icono,
                public.posgrado_materias.imagen AS materia_imagen, -- Alias para evitar conflicto
                public.posgrado_tipos_evaluaciones_notas.nombre AS nombre_tipo_evaluacion_nota,
                public.posgrado_tipos_evaluaciones_notas.configuracion,
                public.posgrado_tipos_evaluaciones_notas.nota_minima_aprobacion,
                public.posgrados_programas.id_nivel_academico,
                public.posgrados_programas.id_carrera,
                public.posgrados_programas.gestion AS gestion_programa,
                public.posgrados_programas.nombre AS nombre_programa,
                public.posgrados_programas.id_modalidad,
                public.posgrados_programas.fecha_inicio,
                public.posgrados_programas.fecha_fin,
                public.modalidades.nombre AS nombre_modalidad,
                public.niveles_academicos.nombre AS nombre_nivel_academico
            FROM
                public.posgrado_asignaciones_docentes
            INNER JOIN public.personas_docentes ON public.posgrado_asignaciones_docentes.id_persona_docente = public.personas_docentes.id_persona_docente
            INNER JOIN public.personas ON public.personas_docentes.id_persona = public.personas.id_persona
            INNER JOIN public.posgrado_materias ON public.posgrado_asignaciones_docentes.id_posgrado_materia = public.posgrado_materias.id_posgrado_materia
            INNER JOIN public.posgrado_tipos_evaluaciones_notas ON public.posgrado_asignaciones_docentes.id_posgrado_tipo_evaluacion_nota = public.posgrado_tipos_evaluaciones_notas.id_posgrado_tipo_evaluacion_nota
            INNER JOIN public.posgrados_programas ON public.posgrado_materias.id_posgrado_programa = public.posgrados_programas.id_posgrado_programa
            INNER JOIN public.gestiones_periodos ON public.posgrado_asignaciones_docentes.id_gestion_periodo = public.gestiones_periodos.id_gestion_periodo
            INNER JOIN public.modalidades ON public.posgrados_programas.id_modalidad = public.modalidades.id_modalidad
            INNER JOIN public.niveles_academicos ON public.posgrados_programas.id_nivel_academico = public.niveles_academicos.id_nivel_academico;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS v_posgrado_asignaciones_docentes");
    }
};
