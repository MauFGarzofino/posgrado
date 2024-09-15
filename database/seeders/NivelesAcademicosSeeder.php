<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NivelesAcademicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('niveles_academicos')->insert([
            ['nombre' => 'Básico', 'descripcion' => 'Nivel Básico', 'estado' => 'S'],
            ['nombre' => 'Intermedio', 'descripcion' => 'Nivel Intermedio', 'estado' => 'S'],
            ['nombre' => 'Avanzado', 'descripcion' => 'Nivel Avanzado', 'estado' => 'S'],
        ]);
    }
}
