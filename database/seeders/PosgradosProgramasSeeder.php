<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PosgradosProgramasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posgrados_programas')->insert([
            [
                'id_nivel_academico' => 1,
                'id_carrera' => 1,
                'gestion' => 2023,
                'nombre' => 'Posgrado en Sistemas Avanzados',
                'id_modalidad' => 1,
                'fecha_inicio' => '2023-01-10',
                'fecha_fin' => '2023-12-20',
                'numero_max_cuotas' => 12,
                'documento' => 'resolucion_123.pdf',
                'costo_total' => 5000.00,
                'formato_contrato' => 'Formato A',
                'formato_contrato_docente' => 'Contrato Docente A',
                'estado' => 'S'
            ],
        ]);
    }
}
