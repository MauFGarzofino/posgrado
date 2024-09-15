<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModulosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('modulos')->insert([
            ['nombre' => 'Módulo de Administración', 'estado' => 'S'],
            ['nombre' => 'Módulo de Configuración', 'estado' => 'S'],
            ['nombre' => 'Módulo de Seguridad', 'estado' => 'S'],
            ['nombre' => 'Módulo Académico', 'estado' => 'S'],
            ['nombre' => 'Módulo Financiero', 'estado' => 'S'],
            ['nombre' => 'Módulo de Personal', 'estado' => 'S'],
            ['nombre' => 'Módulo de Auditoría', 'estado' => 'S'],
            ['nombre' => 'Módulo de Reportes', 'estado' => 'S'],
            ['nombre' => 'Módulo de Soporte Técnico', 'estado' => 'S'],
            ['nombre' => 'Módulo de Mantenimiento', 'estado' => 'S'],
            ['nombre' => 'Módulo de Docentes', 'estado' => 'S'],
        ]);
    }
}
