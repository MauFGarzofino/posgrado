<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PosgradoNivelesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run():void
    {
        DB::table('posgrado_niveles')->insert([
            ['nombre' => 'Básico', 'descripcion' => 'Nivel básico de posgrado', 'estado' => 'S'],
            ['nombre' => 'Intermedio', 'descripcion' => 'Nivel intermedio de posgrado', 'estado' => 'S'],
            ['nombre' => 'Avanzado', 'descripcion' => 'Nivel avanzado de posgrado', 'estado' => 'S'],
        ]);
    }

}
