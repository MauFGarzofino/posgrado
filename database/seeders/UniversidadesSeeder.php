<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UniversidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('universidades')->insert([
            ['nombre' => 'Universidad Mayor de San Andrés', 'nombre_abreviado' => 'UMSA', 'inicial' => 'UMSA', 'estado' => 'S'],
            ['nombre' => 'Universidad Mayor de San Simón', 'nombre_abreviado' => 'UMSS', 'inicial' => 'UMSS', 'estado' => 'S'],
            ['nombre' => 'Universidad Autónoma Gabriel René Moreno', 'nombre_abreviado' => 'UAGRM', 'inicial' => 'UAGRM', 'estado' => 'S'],
            ['nombre' => 'Universidad Autónoma Tomás Frías', 'nombre_abreviado' => 'UATF', 'inicial' => 'UATF', 'estado' => 'S'],
            ['nombre' => 'Universidad Técnica de Oruro', 'nombre_abreviado' => 'UTO', 'inicial' => 'UTO', 'estado' => 'S'],
            ['nombre' => 'Universidad Nacional Siglo XX', 'nombre_abreviado' => 'UNSXX', 'inicial' => 'UNSXX', 'estado' => 'S'],
            ['nombre' => 'Universidad Católica Boliviana San Pablo', 'nombre_abreviado' => 'UCB', 'inicial' => 'UCB', 'estado' => 'S'],
            ['nombre' => 'Universidad Privada de Santa Cruz de la Sierra', 'nombre_abreviado' => 'UPSA', 'inicial' => 'UPSA', 'estado' => 'S'],
            ['nombre' => 'Universidad Privada Boliviana', 'nombre_abreviado' => 'UPB', 'inicial' => 'UPB', 'estado' => 'S'],
            ['nombre' => 'Universidad San Francisco Xavier de Chuquisaca', 'nombre_abreviado' => 'USFX', 'inicial' => 'USFX', 'estado' => 'S'],
        ]);
    }
}
