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
                'id_nivel_academico' => 1, // Nivel Básico
                'id_carrera' => 1, // Carrera ID: Ingeniería de Sistemas
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
            [
                'id_nivel_academico' => 2, // Nivel Intermedio
                'id_carrera' => 2, // Arquitectura
                'gestion' => 2024,
                'nombre' => 'Posgrado en Arquitectura Digital',
                'id_modalidad' => 2,
                'fecha_inicio' => '2024-02-01',
                'fecha_fin' => '2024-11-30',
                'numero_max_cuotas' => 10,
                'documento' => 'resolucion_456.pdf',
                'costo_total' => 7000.00,
                'formato_contrato' => 'Formato B',
                'formato_contrato_docente' => 'Contrato Docente B',
                'estado' => 'S'
            ],
            [
                'id_nivel_academico' => 3, // Nivel Avanzado
                'id_carrera' => 3, // Medicina
                'gestion' => 2025,
                'nombre' => 'Posgrado en Medicina Forense',
                'id_modalidad' => 1,
                'fecha_inicio' => '2025-03-15',
                'fecha_fin' => '2025-12-15',
                'numero_max_cuotas' => 8,
                'documento' => 'resolucion_789.pdf',
                'costo_total' => 8000.00,
                'formato_contrato' => 'Formato C',
                'formato_contrato_docente' => 'Contrato Docente C',
                'estado' => 'S'
            ],
            [
                'id_nivel_academico' => 1, // Nivel Básico
                'id_carrera' => 4, // Derecho
                'gestion' => 2023,
                'nombre' => 'Posgrado en Derecho Constitucional',
                'id_modalidad' => 3,
                'fecha_inicio' => '2023-04-01',
                'fecha_fin' => '2023-12-01',
                'numero_max_cuotas' => 6,
                'documento' => 'resolucion_1011.pdf',
                'costo_total' => 4500.00,
                'formato_contrato' => 'Formato D',
                'formato_contrato_docente' => 'Contrato Docente D',
                'estado' => 'S'
            ],
            [
                'id_nivel_academico' => 2, // Nivel Intermedio
                'id_carrera' => 5, // Economía
                'gestion' => 2024,
                'nombre' => 'Posgrado en Economía Internacional',
                'id_modalidad' => 1,
                'fecha_inicio' => '2024-05-05',
                'fecha_fin' => '2024-12-20',
                'numero_max_cuotas' => 10,
                'documento' => 'resolucion_1314.pdf',
                'costo_total' => 6000.00,
                'formato_contrato' => 'Formato E',
                'formato_contrato_docente' => 'Contrato Docente E',
                'estado' => 'S'
            ]
        ]);
    }
}
