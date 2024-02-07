<?php

namespace Database\Seeders;

use App\Models\Datos_revista;
use App\Models\Revista;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatosRevistasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Datos_revista::factory()->has(Revista::factory()->count(5))->count(2)->create();
    }
}
