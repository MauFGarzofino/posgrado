<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PosgradoAsignacionesDocentesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posgrado_asignaciones_docentes')->insert([
            [
                'id_persona_docente' => 1,
                'id_posgrado_materia' => 1,
                'id_posgrado_tipo_evaluacion_nota' => 1,
                'id_gestion_periodo' => 1,
                'tipo_calificacion' => 'N', // Nota sobre 100
                'grupo' => 'A',
                'cupo_maximo_estudiante' => 30,
                'finaliza_planilla_calificacion' => 'N',
                'fecha_limite_examen_final' => '2024-06-30 23:59:59',
                'fecha_limite_nota_2da_instancia' => '2024-07-15 23:59:59',
                'fecha_limite_nota_examen_mesa' => '2024-07-30 23:59:59',
                'hash' => 'hash_value_1',
                'codigo_barras' => 'barcode_1',
                'codigo_qr' => 'qr_code_1',
                'estado' => 'S'
            ],
            [
                'id_persona_docente' => 2,
                'id_posgrado_materia' => 2,
                'id_posgrado_tipo_evaluacion_nota' => 1,
                'id_gestion_periodo' => 2,
                'tipo_calificacion' => 'N', // Nota sobre 100
                'grupo' => 'B',
                'cupo_maximo_estudiante' => 25,
                'finaliza_planilla_calificacion' => 'N',
                'fecha_limite_examen_final' => '2024-06-30 23:59:59',
                'fecha_limite_nota_2da_instancia' => '2024-07-15 23:59:59',
                'fecha_limite_nota_examen_mesa' => '2024-07-30 23:59:59',
                'hash' => 'hash_value_2',
                'codigo_barras' => 'barcode_2',
                'codigo_qr' => 'qr_code_2',
                'estado' => 'S'
            ],
        ]);
    }
}
