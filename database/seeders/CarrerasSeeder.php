<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarrerasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('carreras')->insert([
            [
                'id_facultad' => 1,
                'id_modalidad' => 1,
                'id_carrera_nivel_academico' => 1,
                'id_sede' => 1,
                'nombre' => 'Ingeniería de Sistemas',
                'nombre_abreviado' => 'Sistemas',
                'fecha_aprobacion_curriculo' => '2010-03-15',
                'fecha_creacion' => '1995-05-10',
                'resolucion' => 'HCU 045/2010',
                'direccion' => 'Calle Universitaria',
                'latitud' => '-19.5833',
                'longitud' => '-65.7539',
                'fax' => '244-1234',
                'telefono' => '244-5678',
                'telefono_interno' => '101',
                'casilla' => '105',
                'email' => 'sistemas@universidad.edu',
                'sitio_web' => 'www.universidad.edu',
                'estado' => 'S'
            ],
            // Puedes agregar más registros aquí
        ]);
    }
}
