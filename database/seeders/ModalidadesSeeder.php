<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModalidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('modalidades')->insert([
            ['nombre' => 'Presencial', 'descripcion' => 'Modalidad presencial', 'estado' => 'S'],
            ['nombre' => 'Virtual', 'descripcion' => 'Modalidad virtual', 'estado' => 'S'],
            ['nombre' => 'Semi Presencial', 'descripcion' => 'Modalidad semi presencial', 'estado' => 'S'],
        ]);
    }

}
