<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SexoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sexos')->insert([
            ['nombre' => 'Masculino', 'estado' => 'S'],
            ['nombre' => 'Femenino', 'estado' => 'S'],
        ]);
    }
}
