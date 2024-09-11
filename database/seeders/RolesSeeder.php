<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['nombre' => 'Administrador', 'descripcion' => 'Tiene acceso completo a todas las funcionalidades del sistema', 'estado' => 'S'],
            ['nombre' => 'Editor', 'descripcion' => 'Puede editar contenido pero tiene acceso limitado a las configuraciones del sistema', 'estado' => 'S'],
            ['nombre' => 'Usuario', 'descripcion' => 'Tiene acceso limitado a las funcionalidades básicas del sistema', 'estado' => 'S'],
            ['nombre' => 'Supervisor', 'descripcion' => 'Supervisa las operaciones y tiene acceso a reportes', 'estado' => 'S'],
            ['nombre' => 'Analista', 'descripcion' => 'Realiza análisis de datos y tiene acceso a reportes', 'estado' => 'S'],
            ['nombre' => 'Invitado', 'descripcion' => 'Acceso limitado solo para ver contenido público', 'estado' => 'N'],
            ['nombre' => 'Estudiante', 'descripcion' => 'Acceso limitado a vista de estudiante', 'estado' => 'S'],
        ]);
    }
}
