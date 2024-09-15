<?php

namespace Database\Seeders;

use App\Models\Pais;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener los IDs de los países
        $bolivia = Pais::where('nombre', 'Bolivia')->first();
        $brasil = Pais::where('nombre', 'Brasil')->first();

        // Insertar departamentos
        DB::table('departamentos')->insert([
            ['id_pais' => $bolivia->id_pais, 'nombre' => 'La Paz', 'estado' => 'S'],
            ['id_pais' => $bolivia->id_pais, 'nombre' => 'Cochabamba', 'estado' => 'S'],
            ['id_pais' => $brasil->id_pais, 'nombre' => 'São Paulo', 'estado' => 'S'],
            ['id_pais' => $brasil->id_pais, 'nombre' => 'Rio de Janeiro', 'estado' => 'S'],
        ]);
    }
}
