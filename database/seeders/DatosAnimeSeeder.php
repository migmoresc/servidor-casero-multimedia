<?php

namespace Database\Seeders;

use App\Models\Anime;
use App\Models\Datos_anime;
use Illuminate\Database\Seeder;
use illuminate\support\Facades\DB;

class DatosAnimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('datos_anime')->insert([
            'nombre_anime' => 'Boruto'
        ]);

        Datos_anime::factory()->has(Anime::factory()->count(2))->count(15)->create();
    }
}
