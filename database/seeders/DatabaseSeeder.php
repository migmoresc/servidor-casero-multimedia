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
        $this->call([CondicionesSeeder::class, ConfigSeeder::class, DatosUsuariosSeeder::class, UsuarioSeeder::class, DatosVideosSeeder::class, DatosRevistasSeeder::class, DatosAnimeSeeder::class, DatosMusicaSeeder::class, DatosSeriesSeeder::class, DatosPeliculasSeeder::class, DatosLibrosSeeder::class, DocumentalesSeeder::class, SoftwareSeeder::class, OtrosSeeder::class, ArchivosSeeder::class, VeSeeder::class,]);
    }
}
