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
            ['nombre' => 'Sucre Centro', 'estado' => 'S'],
            ['nombre' => 'Yotala', 'estado' => 'S'],
            ['nombre' => 'Tarabuco', 'estado' => 'S'],
            ['nombre' => 'Monteagudo', 'estado' => 'S'],
            ['nombre' => 'Villa Serrano', 'estado' => 'S'],
        ]);
    }

}
