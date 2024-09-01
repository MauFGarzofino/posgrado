<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('facultades')->insert([
            ['id_area' => 1, 'nombre' => 'Facultad de Ciencias Exactas', 'nombre_abreviado' => 'FCE', 'direccion' => 'Av. Principal 123', 'telefono' => '123456789', 'estado' => 'S'],
            ['id_area' => 2, 'nombre' => 'Facultad de Ingeniería', 'nombre_abreviado' => 'FI', 'direccion' => 'Calle Secundaria 456', 'telefono' => '987654321', 'estado' => 'S'],
            ['id_area' => 3, 'nombre' => 'Facultad de Ciencias de la Salud', 'nombre_abreviado' => 'FCS', 'direccion' => 'Av. Tercera 789', 'telefono' => '456123789', 'estado' => 'S'],
            ['id_area' => 4, 'nombre' => 'Facultad de Ciencias Sociales', 'nombre_abreviado' => 'FCSO', 'direccion' => 'Calle Cuarta 101', 'telefono' => '321654987', 'estado' => 'S'],
            ['id_area' => 5, 'nombre' => 'Facultad de Artes y Humanidades', 'nombre_abreviado' => 'FAH', 'direccion' => 'Av. Quinta 202', 'telefono' => '654321987', 'estado' => 'S'],
            ['id_area' => 6, 'nombre' => 'Facultad de Economía y Finanzas', 'nombre_abreviado' => 'FEF', 'direccion' => 'Calle Sexta 303', 'telefono' => '987123456', 'estado' => 'S'],
            ['id_area' => 7, 'nombre' => 'Facultad de Derecho', 'nombre_abreviado' => 'FD', 'direccion' => 'Av. Séptima 404', 'telefono' => '123789456', 'estado' => 'S'],
            ['id_area' => 8, 'nombre' => 'Facultad de Agronomía', 'nombre_abreviado' => 'FA', 'direccion' => 'Calle Octava 505', 'telefono' => '789654123', 'estado' => 'S'],
            ['id_area' => 9, 'nombre' => 'Facultad de Arquitectura', 'nombre_abreviado' => 'FARQ', 'direccion' => 'Av. Novena 606', 'telefono' => '456789123', 'estado' => 'S'],
            ['id_area' => 10, 'nombre' => 'Facultad de Educación', 'nombre_abreviado' => 'FEDU', 'direccion' => 'Calle Décima 707', 'telefono' => '321987654', 'estado' => 'S'],
        ]);
    }
}
