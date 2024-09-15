<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesMenusPrincipalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles_menus_principales')->insert([
            ['id_rol' => 1, 'id_menu_principal' => 1, 'estado' => 'S'], // Admin - Administración
            ['id_rol' => 1, 'id_menu_principal' => 2, 'estado' => 'S'], // Admin - Configuración
            ['id_rol' => 1, 'id_menu_principal' => 3, 'estado' => 'S'], // Admin - Seguridad
            ['id_rol' => 1, 'id_menu_principal' => 4, 'estado' => 'S'], // Admin - Seguridad
            ['id_rol' => 1, 'id_menu_principal' => 5, 'estado' => 'S'], // Admin - Seguridad
            ['id_rol' => 1, 'id_menu_principal' => 6, 'estado' => 'S'], // Admin - Seguridad
            ['id_rol' => 1, 'id_menu_principal' => 8, 'estado' => 'S'], // Admin - Seguridad
            ['id_rol' => 1, 'id_menu_principal' => 11, 'estado' => 'S'], // Asignación Roles
            ['id_rol' => 2, 'id_menu_principal' => 4, 'estado' => 'S'], // Editor - Gestión Académica
            ['id_rol' => 2, 'id_menu_principal' => 5, 'estado' => 'S'], // Editor - Gestión Financiera
            ['id_rol' => 3, 'id_menu_principal' => 6, 'estado' => 'S'], // Usuario - Gestión de Personal
            ['id_rol' => 4, 'id_menu_principal' => 7, 'estado' => 'S'], // Supervisor - Auditoría
            ['id_rol' => 5, 'id_menu_principal' => 8, 'estado' => 'S'],
            ['id_rol' => 6, 'id_menu_principal' => 9, 'estado' => 'N'],
            ['id_rol' => 6, 'id_menu_principal' => 10, 'estado' => 'N'],
            ['id_rol' => 7, 'id_menu_principal' => 4, 'estado' => 'N'],
            ['id_rol' => 7, 'id_menu_principal' => 6, 'estado' => 'N'],
        ]);
    }
}
