<?php

namespace Database\Seeders;

use App\Models\EmisionCedula;
use App\Models\EstadoCivil;
use App\Models\GrupoSanguineo;
use App\Models\Localidad;
use App\Models\Sexo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('personas')->insert([
            [
                'nombres' => 'Diego',
                'paterno' => 'Rivera',
                'materno' => 'Rodríguez',
                'numero_identificacion_personal' => '12345678',
                'id_localidad' => Localidad::first()->id_localidad,
                'id_emision_cedula' => EmisionCedula::first()->id_emision_cedula,
                'id_sexo' => Sexo::where('nombre', 'Masculino')->first()->id_sexo,
                'id_grupo_sanguineo' => GrupoSanguineo::where('nombre', 'O+')->first()->id_grupo_sanguineo,
                'fecha_nacimiento' => '1990-01-01',
                'direccion' => 'Calle Falsa 123',
                'latitud' => '-16.500000',
                'longitud' => '-68.150000',
                'telefono_celular' => '123456789',
                'telefono_fijo' => '2345678',
                'zona' => 'Centro',
                'id_estado_civil' => EstadoCivil::where('nombre', 'Soltero')->first()->id_estado_civil,
                'email' => 'juan@example.com',
                'fotografia' => 'default.jpg',
                'usuario' => 'juanperez',
                'password' => bcrypt('password123'),
                'abreviacion_titulo' => 'Sr.',
                'estado' => 'S'
            ],
            [
                'nombres' => 'Maria',
                'paterno' => 'Vargas',
                'materno' => 'Muñoz',
                'numero_identificacion_personal' => '87654321',
                'id_localidad' => Localidad::first()->id_localidad,
                'id_emision_cedula' => EmisionCedula::first()->id_emision_cedula,
                'id_sexo' => Sexo::where('nombre', 'Femenino')->first()->id_sexo,
                'id_grupo_sanguineo' => GrupoSanguineo::where('nombre', 'A+')->first()->id_grupo_sanguineo,
                'fecha_nacimiento' => '1985-05-10',
                'direccion' => 'Avenida Siempreviva 742',
                'latitud' => '-17.500000',
                'longitud' => '-66.150000',
                'telefono_celular' => '987654321',
                'telefono_fijo' => '8765432',
                'zona' => 'Norte',
                'id_estado_civil' => EstadoCivil::where('nombre', 'Casado')->first()->id_estado_civil,
                'email' => 'maria@example.com',
                'fotografia' => 'default.jpg',
                'usuario' => 'marialopez',
                'password' => bcrypt('password123'),
                'abreviacion_titulo' => 'Sra.',
                'estado' => 'S'
            ],
            [
                'nombres' => 'James',
                'paterno' => 'Sánchez',
                'materno' => 'Silva',
                'numero_identificacion_personal' => '11223344',
                'id_localidad' => Localidad::first()->id_localidad,
                'id_emision_cedula' => EmisionCedula::first()->id_emision_cedula,
                'id_sexo' => Sexo::where('nombre', 'Masculino')->first()->id_sexo,
                'id_grupo_sanguineo' => GrupoSanguineo::where('nombre', 'B-')->first()->id_grupo_sanguineo,
                'fecha_nacimiento' => '1995-12-12',
                'direccion' => 'Calle Arce 456',
                'latitud' => '-18.500000',
                'longitud' => '-64.150000',
                'telefono_celular' => '1122334455',
                'telefono_fijo' => '99887766',
                'zona' => 'Este',
                'id_estado_civil' => EstadoCivil::where('nombre', 'Soltero')->first()->id_estado_civil,
                'email' => 'carlos@example.com',
                'fotografia' => 'default.jpg',
                'usuario' => 'carlosrodriguez',
                'password' => bcrypt('password123'),
                'abreviacion_titulo' => 'Ing.',
                'estado' => 'S'
            ],
        ]);
    }
}
