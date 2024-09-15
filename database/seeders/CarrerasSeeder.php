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
            [
                'id_facultad' => 2,
                'id_modalidad' => 2,
                'id_carrera_nivel_academico' => 2,
                'id_sede' => 2,
                'nombre' => 'Arquitectura',
                'nombre_abreviado' => 'Arq.',
                'fecha_aprobacion_curriculo' => '2005-06-10',
                'fecha_creacion' => '1980-04-01',
                'resolucion' => 'HCU 078/2005',
                'direccion' => 'Av. Blanco Galindo',
                'latitud' => '-19.5888',
                'longitud' => '-65.7610',
                'fax' => '245-5678',
                'telefono' => '245-2345',
                'telefono_interno' => '102',
                'casilla' => '108',
                'email' => 'arquitectura@universidad.edu',
                'sitio_web' => 'www.universidad.edu/arquitectura',
                'estado' => 'S'
            ],
            [
                'id_facultad' => 3,
                'id_modalidad' => 1,
                'id_carrera_nivel_academico' => 3,
                'id_sede' => 3,
                'nombre' => 'Medicina',
                'nombre_abreviado' => 'Med.',
                'fecha_aprobacion_curriculo' => '1999-08-25',
                'fecha_creacion' => '1965-09-01',
                'resolucion' => 'HCU 120/1999',
                'direccion' => 'Calle Mendoza',
                'latitud' => '-19.5920',
                'longitud' => '-65.7620',
                'fax' => '246-8765',
                'telefono' => '246-1234',
                'telefono_interno' => '103',
                'casilla' => '112',
                'email' => 'medicina@universidad.edu',
                'sitio_web' => 'www.universidad.edu/medicina',
                'estado' => 'S'
            ],
            [
                'id_facultad' => 4,
                'id_modalidad' => 3,
                'id_carrera_nivel_academico' => 2,
                'id_sede' => 4,
                'nombre' => 'Derecho',
                'nombre_abreviado' => 'Derecho',
                'fecha_aprobacion_curriculo' => '2015-01-30',
                'fecha_creacion' => '1945-03-20',
                'resolucion' => 'HCU 256/2015',
                'direccion' => 'Calle Sucre',
                'latitud' => '-19.6010',
                'longitud' => '-65.7700',
                'fax' => '247-8901',
                'telefono' => '247-4567',
                'telefono_interno' => '104',
                'casilla' => '118',
                'email' => 'derecho@universidad.edu',
                'sitio_web' => 'www.universidad.edu/derecho',
                'estado' => 'S'
            ],
            [
                'id_facultad' => 5,
                'id_modalidad' => 1,
                'id_carrera_nivel_academico' => 1,
                'id_sede' => 5,
                'nombre' => 'Economía',
                'nombre_abreviado' => 'Econ.',
                'fecha_aprobacion_curriculo' => '2018-10-12',
                'fecha_creacion' => '1975-07-15',
                'resolucion' => 'HCU 305/2018',
                'direccion' => 'Calle Comercio',
                'latitud' => '-19.6100',
                'longitud' => '-65.7800',
                'fax' => '248-3456',
                'telefono' => '248-5678',
                'telefono_interno' => '105',
                'casilla' => '124',
                'email' => 'economia@universidad.edu',
                'sitio_web' => 'www.universidad.edu/economia',
                'estado' => 'S'
            ]
        ]);
    }
}
