<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuarios')->insert([
            [
                'id_persona' => 1,
                'id_rol' => 1,
                'username' => 'juanperez',
                'email' => 'juan.perez@example.com',
                'password' => Hash::make('password123'),
                'estado' => 'S',
            ],
            [
                'id_persona' => 2,
                'id_rol' => 2,
                'username' => 'mariagomez',
                'email' => 'maria.gomez@example.com',
                'password' => Hash::make('password456'),
                'estado' => 'S',
            ],
            [
                'id_persona' => 3,
                'id_rol' => 7,
                'username' => 'diana.castillo',
                'email' => 'diana.castillo@example.com',
                'password' => Hash::make('password789'),
                'estado' => 'S',
            ],
        ]);
    }
}
