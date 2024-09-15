<?php

namespace Database\Seeders;

use App\Models\Departamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener IDs de departamentos
        $lapaz = Departamento::where('nombre', 'La Paz')->first();
        $cochabamba = Departamento::where('nombre', 'Cochabamba')->first();
        $saopaulo = Departamento::where('nombre', 'São Paulo')->first();

        // Insertar provincias
        DB::table('provincias')->insert([
            ['id_departamento' => $lapaz->id_departamento, 'nombre' => 'Murillo', 'estado' => 'S'],
            ['id_departamento' => $cochabamba->id_departamento, 'nombre' => 'Quillacollo', 'estado' => 'S'],
            ['id_departamento' => $saopaulo->id_departamento, 'nombre' => 'São Paulo', 'estado' => 'S'],
        ]);
    }
}
