<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PosgradoTiposEvaluacionesNotasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posgrado_tipos_evaluaciones_notas')->insert([
            ['nombre' => 'P1', 'configuracion' => '{"ponderacion": 30}', 'nota_minima_aprobacion' => 51, 'estado' => 'S'],
            ['nombre' => 'P2', 'configuracion' => '{"ponderacion": 70}', 'nota_minima_aprobacion' => 56, 'estado' => 'S'],
        ]);
    }
}
