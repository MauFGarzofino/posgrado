<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);

        $this->call([
            UniversidadesSeeder::class,
            ConfiguracionesSeeder::class,
            AreasSeeder::class,
            FacultadesSeeder::class,
            ModulosSeeder::class,
            MenusPrincipalesSeeder::class,
            MenusSeeder::class,
            RolesSeeder::class,
            RolesMenusPrincipalesSeeder::class,
            ModalidadesSeeder::class,
            CarrerasNivelesAcademicosSeeder::class,
            PosgradoNivelesSeeder::class,
            SedesSeeder::class,
            CarrerasSeeder::class,
            NivelesAcademicosSeeder::class,
            PosgradoNivelesSeeder::class,
            PosgradosProgramasSeeder::class,
            PosgradoMateriasSeeder::class,
            PosgradoTiposEvaluacionesNotasSeeder::class,
            GestionesPeriodosSeeder::class,
            PaisSeeder::class,
            DepartamentoSeeder::class,
            ProvinciaSeeder::class,
            LocalidadSeeder::class,
            GrupoSanguineoSeeder::class,
            EstadoCivilSeeder::class,
            SexoSeeder::class,
            EmisionCedulaSeeder::class,
            PersonasSeeder::class,
            UsuariosSeeder::class,
            PersonasDocentesSeeder::class,
            PosgradoAsignacionesDocentesSeeder::class,
        ]);
    }
}
