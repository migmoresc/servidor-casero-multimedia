<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('tipos')->insert([
            'id' => 1,
            // 'id_tabla' => 1,
            // 'nombre_tabla' => 'animes',
            'tipable_id' => 1,
            'tipable_type' => 'App\Models\Anime'
        ]);
    }
}
