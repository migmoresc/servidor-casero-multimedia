<?php

namespace Database\Seeders;

use App\Models\Datos_musica;
use App\Models\Musica;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatosMusicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Datos_musica::factory()->has(Musica::factory()->count(5))->count(2)->create();
    }
}
