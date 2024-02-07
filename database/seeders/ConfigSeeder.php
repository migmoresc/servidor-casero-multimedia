<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('configs')->insert([[
            'idioma' => 'es',
            'dia_noche' => '1',
        ], [
            'idioma' => 'es',
            'dia_noche' => '0',
        ], [
            'idioma' => 'en',
            'dia_noche' => '1',
        ], [
            'idioma' => 'en',
            'dia_noche' => '0',
        ]]);
    }
}
