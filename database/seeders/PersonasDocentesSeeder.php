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
                'id_persona' => 1,
                'fecha_ingreso' => '2020-01-10',
                'fecha' => now(),
                'estado' => 'S',
            ],
            [
                'id_persona' => 2,
                'fecha_ingreso' => '2021-05-22',
                'fecha' => now(),
                'estado' => 'S',
            ],
            [
                'id_persona' => 3,
                'fecha_ingreso' => '2022-09-15',
                'fecha' => now(),
                'estado' => 'S',
            ],
        ]);
    }
}
