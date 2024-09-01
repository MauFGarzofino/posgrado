<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonasSeeder extends Seeder
{
    public function run()
    {
        DB::table('personas')->insert([
            [
                'ci' => '12345678',
                'nombres' => 'Juan',
                'apellidos' => 'Perez',
                'imagen' => 'https://plus.unsplash.com/premium_photo-1682124752476-40db22034a58',
            ],
            [
                'ci' => '87654321',
                'nombres' => 'Maria',
                'apellidos' => 'Gomez',
                'imagen' => 'https://images.unsplash.com/photo-1524373079361-ff1452de1d84',
            ],
            [
                'ci' => '11223344',
                'nombres' => 'Diana',
                'apellidos' => 'Castillo',
                'imagen' => 'https://images.unsplash.com/photo-1513836279014-a89f7a76ae86',
            ],
            [
                'ci' => '55667788',
                'nombres' => 'Ana',
                'apellidos' => 'Lopez',
                'imagen' => 'https://images.unsplash.com/photo-1420745981456-b95fe23f5753',
            ],
        ]);
    }
}
