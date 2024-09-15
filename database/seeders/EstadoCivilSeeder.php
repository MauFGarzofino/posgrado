<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoCivilSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('estados_civiles')->insert([
            ['nombre' => 'Soltero', 'estado' => 'S'],
            ['nombre' => 'Casado', 'estado' => 'S'],
            ['nombre' => 'Divorciado', 'estado' => 'S'],
            ['nombre' => 'Viudo', 'estado' => 'S'],
        ]);
    }
}
