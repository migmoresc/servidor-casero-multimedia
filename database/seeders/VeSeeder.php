<?php

namespace Database\Seeders;

use Faker\Factory;

use App\Models\Usuario;
use App\Models\Archivo;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Factory::create();

        for ($i = 0; $i < 50; $i++) {
            DB::table('ve')->insert(
                [
                    'fecha_ultimo' => $faker->date(),
                    'tiempo_pause' => $faker->randomNumber(),
                    'volumen' => $faker->randomFloat(2, 0, 100),
                    'puntuacion' => $faker->randomFloat(1, 0, 5),
                    'resumen' => $faker->text(),
                    'id_usuario' => Usuario::all()->random(1)->first()->id,
                    'id_archivo' => Archivo::all()->random(1)->first()->id,
                ]
            );
        }
    }
}
