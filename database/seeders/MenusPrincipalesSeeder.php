<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenusPrincipalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menus_principales')->insert([
            ['id_modulo' => 1, 'nombre' => 'Administración', 'icono' => 'admin-icon', 'orden' => 1, 'estado' => 'S'],
            ['id_modulo' => 2, 'nombre' => 'Configuración', 'icono' => 'config-icon', 'orden' => 2, 'estado' => 'S'],
            ['id_modulo' => 3, 'nombre' => 'Seguridad', 'icono' => 'security-icon', 'orden' => 3, 'estado' => 'S'],
            ['id_modulo' => 4, 'nombre' => 'Gestión Académica', 'icono' => 'academic-icon', 'orden' => 4, 'estado' => 'S'],
            ['id_modulo' => 5, 'nombre' => 'Gestión Financiera', 'icono' => 'finance-icon', 'orden' => 5, 'estado' => 'S'],
            ['id_modulo' => 6, 'nombre' => 'Gestión de Personal', 'icono' => 'staff-icon', 'orden' => 6, 'estado' => 'S'],
            ['id_modulo' => 7, 'nombre' => 'Auditoría', 'icono' => 'audit-icon', 'orden' => 7, 'estado' => 'S'],
            ['id_modulo' => 8, 'nombre' => 'Reportes', 'icono' => 'report-icon', 'orden' => 8, 'estado' => 'S'],
            ['id_modulo' => 9, 'nombre' => 'Soporte Técnico', 'icono' => 'support-icon', 'orden' => 9, 'estado' => 'S'],
            ['id_modulo' => 10, 'nombre' => 'Mantenimiento', 'icono' => 'maintenance-icon', 'orden' => 10, 'estado' => 'S'],
            ['id_modulo' => 11, 'nombre' => 'Programas Posgrado', 'icono' => 'programas-icon', 'orden' => 11, 'estado' => 'S'],
        ]);
    }
}
