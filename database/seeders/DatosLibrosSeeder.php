<?php

namespace Database\Seeders;

use App\Models\Datos_libro;
use App\Models\Libro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatosLibrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Datos_libro::factory()->has(Libro::factory()->count(2))->count(5)->create();
    }
}
