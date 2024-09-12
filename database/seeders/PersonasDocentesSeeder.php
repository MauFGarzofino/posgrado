<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonasDocentesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('personas_docentes')->insert([
            [
                'id_persona' => 1, // Relación con una persona existente
                'fecha_ingreso' => '2020-01-10',
                'fecha' => now(),
                'estado' => 'S',
            ],
            [
                'id_persona' => 2, // Relación con una persona existente
                'fecha_ingreso' => '2021-05-22',
                'fecha' => now(),
                'estado' => 'S',
            ],
            [
                'id_persona' => 3, // Relación con una persona existente
                'fecha_ingreso' => '2022-09-15',
                'fecha' => now(),
                'estado' => 'S',
            ],
            [
                'id_persona' => 4, // Relación con una persona existente
                'fecha_ingreso' => '2021-03-12',
                'fecha' => now(),
                'estado' => 'S',
            ],
            [
                'id_persona' => 5, // Relación con una persona existente
                'fecha_ingreso' => '2022-11-07',
                'fecha' => now(),
                'estado' => 'S',
            ],
        ]);
    }
}
