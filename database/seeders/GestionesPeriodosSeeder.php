<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GestionesPeriodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gestiones_periodos')->insert([
            [
                'gestion' => 2024,
                'periodo' => 1,
                'tipo' => 'S', // Semestral
                'estado' => 'S'
            ],
            [
                'gestion' => 2023,
                'periodo' => 2,
                'tipo' => 'S', // Semestral
                'estado' => 'S'
            ],
            [
                'gestion' => 2023,
                'periodo' => 1,
                'tipo' => 'S', // Semestral
                'estado' => 'S'
            ],
            [
                'gestion' => 2022,
                'periodo' => 1,
                'tipo' => 'A', // Anual
                'estado' => 'S'
            ],
        ]);
    }
}
