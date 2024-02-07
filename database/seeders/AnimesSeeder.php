<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('animes')->insert([
            'Numero_temporada' => 1,
            'Numero_episodio' => 1,
            'id_datos_anime' => 1
        ]);
    }
}
