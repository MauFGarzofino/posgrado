<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmisionCedulaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('emision_cedulas')->insert([
            ['nombre' => 'PT', 'descripcion' => 'Potosí', 'estado' => 'S'],
            ['nombre' => 'CH', 'descripcion' => 'Chuquisaca', 'estado' => 'S'],
            ['nombre' => 'EX', 'descripcion' => 'Extranjero', 'estado' => 'S'],
        ]);
    }
}
