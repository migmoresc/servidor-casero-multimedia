<?php

namespace Database\Seeders;

use App\Models\Datos_serie;
use App\Models\Serie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatosSeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Datos_serie::factory()->has(Serie::factory()->count(10))->count(5)->create();
    }
}
