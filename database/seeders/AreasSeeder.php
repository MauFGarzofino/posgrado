<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('areas')->insert([
            ['nombre' => 'Ciencias Exactas', 'nombre_abreviado' => 'CEX', 'estado' => 'S', 'id_universidad' => 1],
            ['nombre' => 'Ingeniería', 'nombre_abreviado' => 'ING', 'estado' => 'S', 'id_universidad' => 2],
            ['nombre' => 'Ciencias de la Salud', 'nombre_abreviado' => 'CS', 'estado' => 'S', 'id_universidad' => 3],
            ['nombre' => 'Ciencias Sociales', 'nombre_abreviado' => 'CSO', 'estado' => 'S', 'id_universidad' => 4],
            ['nombre' => 'Artes y Humanidades', 'nombre_abreviado' => 'AH', 'estado' => 'S', 'id_universidad' => 5],
            ['nombre' => 'Economía y Finanzas', 'nombre_abreviado' => 'EF', 'estado' => 'S', 'id_universidad' => 6],
            ['nombre' => 'Derecho', 'nombre_abreviado' => 'DER', 'estado' => 'S', 'id_universidad' => 7],
            ['nombre' => 'Agronomía', 'nombre_abreviado' => 'AGR', 'estado' => 'S', 'id_universidad' => 8],
            ['nombre' => 'Arquitectura', 'nombre_abreviado' => 'ARQ', 'estado' => 'S', 'id_universidad' => 9],
            ['nombre' => 'Educación', 'nombre_abreviado' => 'EDU', 'estado' => 'S', 'id_universidad' => 10],
        ]);
    }
}
