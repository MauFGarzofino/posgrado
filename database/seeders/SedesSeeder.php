<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SedesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sedes')->insert([
            ['nombre' => 'Local Potosí', 'estado' => 'S'],
            ['nombre' => 'Uyuni', 'estado' => 'S'],
            ['nombre' => 'Villazón', 'estado' => 'S'],
            ['nombre' => 'Uncía', 'estado' => 'S'],
        ]);
    }

}
