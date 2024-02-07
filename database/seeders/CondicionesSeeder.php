<?php

namespace Database\Seeders;

use App\Models\Condicion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CondicionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // //
        // DB::table('condiciones')->insert([
        //     'id' => 1,
        //     'texto' => 'texto condiciones'
        // ]);

        Condicion::factory(2)->create();
    }
}
