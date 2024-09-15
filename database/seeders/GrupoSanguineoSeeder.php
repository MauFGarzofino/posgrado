<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrupoSanguineoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('grupos_sanguineos')->insert([
            ['nombre' => 'O+', 'estado' => 'S'],
            ['nombre' => 'O-', 'estado' => 'S'],
            ['nombre' => 'A+', 'estado' => 'S'],
            ['nombre' => 'A-', 'estado' => 'S'],
            ['nombre' => 'B+', 'estado' => 'S'],
            ['nombre' => 'B-', 'estado' => 'S'],
            ['nombre' => 'AB+', 'estado' => 'S'],
            ['nombre' => 'AB-', 'estado' => 'S'],
        ]);
    }
}
