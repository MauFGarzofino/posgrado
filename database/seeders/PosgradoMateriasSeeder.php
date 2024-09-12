<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PosgradoMateriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posgrado_materias')->insert([
            [
                'id_posgrado_programa' => 1,
                'id_posgrado_nivel' => 1,
                'sigla' => 'MAT101',
                'nombre' => 'Matemáticas Básicas',
                'nivel_curso' => 1,
                'cantidad_hora_teorica' => 30,
                'cantidad_hora_practica' => 15,
                'cantidad_credito' => 3,
                'color' => '#FF5733',
                'icono' => 'math_icon.png',
                'estado' => 'S'
            ],
            [
                'id_posgrado_programa' => 1,
                'id_posgrado_nivel' => 1,
                'sigla' => 'PHY101',
                'nombre' => 'Física Básica',
                'nivel_curso' => 1,
                'cantidad_hora_teorica' => 35,
                'cantidad_hora_practica' => 10,
                'cantidad_credito' => 4,
                'color' => '#33FF57',
                'icono' => 'physics_icon.png',
                'estado' => 'S'
            ],
        ]);
    }
}
