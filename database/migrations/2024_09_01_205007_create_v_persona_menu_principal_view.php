<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            CREATE VIEW VPersonaMenuPrincipal AS
            SELECT
                personas.id_persona,
                personas.nombres,
                personas.apellidos,
                personas.imagen AS fotografia,
                usuarios.username AS usuario,
                usuarios.password,
                usuarios.email,
                roles.nombre AS nombre_rol,
                roles.id_rol
            FROM
                usuarios
            JOIN personas ON personas.id_persona = usuarios.id_persona
            JOIN roles ON roles.id_rol = usuarios.id_rol
        ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS VPersonaMenuPrincipal");
    }
};
