<?php

namespace Database\Seeders;

use App\Models\Datos_pelicula;
use App\Models\Pelicula;
use Illuminate\Database\Seeder;

class DatosPeliculasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Datos_pelicula::factory()->has(Pelicula::factory()->count(3))->count(5)->create();
    }
}
