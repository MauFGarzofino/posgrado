<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarrerasNivelesAcademicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('carreras_niveles_academicos')->insert([
            ['nombre' => 'Licenciatura', 'descripcion' => 'Nivel académico de licenciatura', 'estado' => 'S'],
            ['nombre' => 'Maestría', 'descripcion' => 'Nivel académico de maestría', 'estado' => 'S'],
            ['nombre' => 'Doctorado', 'descripcion' => 'Nivel académico de doctorado', 'estado' => 'S'],
        ]);
    }

}
