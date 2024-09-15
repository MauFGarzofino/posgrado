<?php

namespace Database\Seeders;

use App\Models\Provincia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener IDs de provincias
        $murillo = Provincia::where('nombre', 'Murillo')->first();
        $quillacollo = Provincia::where('nombre', 'Quillacollo')->first();
        $saopaulo = Provincia::where('nombre', 'São Paulo')->first();

        // Insertar localidades
        DB::table('localidades')->insert([
            ['id_provincia' => $murillo->id_provincia, 'nombre' => 'El Alto', 'estado' => 'S'],
            ['id_provincia' => $quillacollo->id_provincia, 'nombre' => 'Colcapirhua', 'estado' => 'S'],
            ['id_provincia' => $saopaulo->id_provincia, 'nombre' => 'Campinas', 'estado' => 'S'],
        ]);
    }
}
