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
            // Program 1: Posgrado en Sistemas Avanzados
            [
                'id_posgrado_programa' => 1,
                'id_posgrado_nivel' => 1, // Nivel Básico
                'sigla' => 'SIS101',
                'nombre' => 'Fundamentos de Sistemas',
                'nivel_curso' => 1,
                'cantidad_hora_teorica' => 30,
                'cantidad_hora_practica' => 10,
                'cantidad_credito' => 4,
                'color' => '#FF5733',
                'icono' => 'system_icon.png',
                'estado' => 'S'
            ],
            [
                'id_posgrado_programa' => 1,
                'id_posgrado_nivel' => 1,
                'sigla' => 'DAT101',
                'nombre' => 'Bases de Datos',
                'nivel_curso' => 1,
                'cantidad_hora_teorica' => 40,
                'cantidad_hora_practica' => 20,
                'cantidad_credito' => 5,
                'color' => '#33FF57',
                'icono' => 'database_icon.png',
                'estado' => 'S'
            ],
            // Program 2: Posgrado en Arquitectura Digital
            [
                'id_posgrado_programa' => 2,
                'id_posgrado_nivel' => 2, // Nivel Intermedio
                'sigla' => 'ARC201',
                'nombre' => 'Diseño Digital',
                'nivel_curso' => 2,
                'cantidad_hora_teorica' => 35,
                'cantidad_hora_practica' => 15,
                'cantidad_credito' => 4,
                'color' => '#FFA500',
                'icono' => 'design_icon.png',
                'estado' => 'S'
            ],
            [
                'id_posgrado_programa' => 2,
                'id_posgrado_nivel' => 2,
                'sigla' => 'ARC202',
                'nombre' => 'Renderizado 3D',
                'nivel_curso' => 2,
                'cantidad_hora_teorica' => 25,
                'cantidad_hora_practica' => 25,
                'cantidad_credito' => 4,
                'color' => '#ADD8E6',
                'icono' => 'render_icon.png',
                'estado' => 'S'
            ],
            // Program 3: Posgrado en Medicina Forense
            [
                'id_posgrado_programa' => 3,
                'id_posgrado_nivel' => 3, // Nivel Avanzado
                'sigla' => 'MED301',
                'nombre' => 'Autopsias Forenses',
                'nivel_curso' => 3,
                'cantidad_hora_teorica' => 50,
                'cantidad_hora_practica' => 20,
                'cantidad_credito' => 6,
                'color' => '#FFC0CB',
                'icono' => 'autopsy_icon.png',
                'estado' => 'S'
            ],
            [
                'id_posgrado_programa' => 3,
                'id_posgrado_nivel' => 3,
                'sigla' => 'MED302',
                'nombre' => 'Toxicología Forense',
                'nivel_curso' => 3,
                'cantidad_hora_teorica' => 40,
                'cantidad_hora_practica' => 15,
                'cantidad_credito' => 5,
                'color' => '#90EE90',
                'icono' => 'toxicology_icon.png',
                'estado' => 'S'
            ],
            // Program 4: Posgrado en Derecho Constitucional
            [
                'id_posgrado_programa' => 4,
                'id_posgrado_nivel' => 1, // Nivel Básico
                'sigla' => 'DCH101',
                'nombre' => 'Derecho Constitucional I',
                'nivel_curso' => 1,
                'cantidad_hora_teorica' => 30,
                'cantidad_hora_practica' => 10,
                'cantidad_credito' => 4,
                'color' => '#FFD700',
                'icono' => 'law_icon.png',
                'estado' => 'S'
            ],
            [
                'id_posgrado_programa' => 4,
                'id_posgrado_nivel' => 1,
                'sigla' => 'DCH102',
                'nombre' => 'Derecho Constitucional II',
                'nivel_curso' => 1,
                'cantidad_hora_teorica' => 30,
                'cantidad_hora_practica' => 15,
                'cantidad_credito' => 4,
                'color' => '#20B2AA',
                'icono' => 'law_icon_2.png',
                'estado' => 'S'
            ],
            // Program 5: Posgrado en Economía Internacional
            [
                'id_posgrado_programa' => 5,
                'id_posgrado_nivel' => 2, // Nivel Intermedio
                'sigla' => 'ECO201',
                'nombre' => 'Teoría Económica Internacional',
                'nivel_curso' => 2,
                'cantidad_hora_teorica' => 35,
                'cantidad_hora_practica' => 10,
                'cantidad_credito' => 5,
                'color' => '#FF6347',
                'icono' => 'economy_icon.png',
                'estado' => 'S'
            ],
            [
                'id_posgrado_programa' => 5,
                'id_posgrado_nivel' => 2,
                'sigla' => 'ECO202',
                'nombre' => 'Política Económica Internacional',
                'nivel_curso' => 2,
                'cantidad_hora_teorica' => 40,
                'cantidad_hora_practica' => 15,
                'cantidad_credito' => 5,
                'color' => '#4682B4',
                'icono' => 'policy_icon.png',
                'estado' => 'S'
            ],
        ]);
    }
}
