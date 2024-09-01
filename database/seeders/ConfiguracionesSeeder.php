<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfiguracionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('configuraciones')->insert([
            ['tipo' => 'Horario de Clases', 'descripcion' => 'Horario oficial para el semestre 1', 'estado' => 'S', 'id_universidad' => 1],
            ['tipo' => 'Reglamento Interno', 'descripcion' => 'Reglamento actualizado del año 2024', 'estado' => 'S', 'id_universidad' => 1],
            ['tipo' => 'Calendario Académico', 'descripcion' => 'Calendario oficial para el año 2024', 'estado' => 'S', 'id_universidad' => 2],
            ['tipo' => 'Normativa de Evaluación', 'descripcion' => 'Normas para la evaluación de estudiantes', 'estado' => 'S', 'id_universidad' => 3],
            ['tipo' => 'Política de Admisiones', 'descripcion' => 'Política de admisiones para nuevos estudiantes', 'estado' => 'S', 'id_universidad' => 4],
            ['tipo' => 'Manual de Convivencia', 'descripcion' => 'Manual para la convivencia estudiantil', 'estado' => 'S', 'id_universidad' => 5],
            ['tipo' => 'Reglamento de Titulación', 'descripcion' => 'Normativa para procesos de titulación', 'estado' => 'S', 'id_universidad' => 6],
            ['tipo' => 'Directrices de Investigación', 'descripcion' => 'Políticas para la investigación académica', 'estado' => 'S', 'id_universidad' => 7],
            ['tipo' => 'Plan de Desarrollo Institucional', 'descripcion' => 'Plan estratégico para el desarrollo institucional', 'estado' => 'S', 'id_universidad' => 8],
            ['tipo' => 'Normativa de Seguridad', 'descripcion' => 'Normas de seguridad para la comunidad universitaria', 'estado' => 'S', 'id_universidad' => 9],
        ]);
    }
}
