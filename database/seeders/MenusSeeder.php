<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menus')->insert([
            ['id_menu_principal' => 1, 'nombre' => 'Gestión de Usuarios', 'directorio' => 'usuarios', 'icono' => 'user-icon', 'estado' => 'S'],
            ['id_menu_principal' => 2, 'nombre' => 'Gestión de Roles', 'directorio' => 'roles', 'icono' => 'role-icon', 'estado' => 'S'],
            ['id_menu_principal' => 3, 'nombre' => 'Gestión de Permisos', 'directorio' => 'roles-menus-principales', 'icono' => 'permission-icon', 'estado' => 'S'],
            ['id_menu_principal' => 4, 'nombre' => 'Gestión de Facultades', 'directorio' => 'facultades', 'icono' => 'faculty-icon', 'estado' => 'S'],
            ['id_menu_principal' => 5, 'nombre' => 'Gestión de Áreas', 'directorio' => 'areas', 'icono' => 'area-icon', 'estado' => 'S'],
            ['id_menu_principal' => 6, 'nombre' => 'Gestión de Universidades', 'directorio' => 'universidades', 'icono' => 'university-icon', 'estado' => 'S'],
            ['id_menu_principal' => 7, 'nombre' => 'Configuración General', 'directorio' => 'configuracion-general', 'icono' => 'config-icon', 'estado' => 'S'],
            ['id_menu_principal' => 8, 'nombre' => 'Gestión de Menús', 'directorio' => 'menus', 'icono' => 'menu-icon', 'estado' => 'S'],
            ['id_menu_principal' => 9, 'nombre' => 'Auditoría', 'directorio' => 'auditoria', 'icono' => 'audit-icon', 'estado' => 'S'],
            ['id_menu_principal' => 10, 'nombre' => 'Reportes', 'directorio' => 'reportes', 'icono' => 'report-icon', 'estado' => 'S'],
            ['id_menu_principal' => 11, 'nombre' => 'Asignación Docentes', 'directorio' => 'asignacion-docentes', 'icono' => 'asignacion-icon', 'estado' => 'S'],
        ]);

    }
}
