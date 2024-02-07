<?php

namespace Database\Seeders;

use App\Models\Datos_video;
use App\Models\Video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatosVideosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Datos_video::factory()->has(Video::factory()->count(5))->count(2)->create();
    }
}
