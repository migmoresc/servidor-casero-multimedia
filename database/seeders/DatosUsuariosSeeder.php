<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\DatosUsuario;
use App\Models\Condicion;
use Database\Factories\CondicionesFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatosUsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('datos_usuarios')->insert([
        //     [
        //         'email' => 'a@gmail.com',
        //         'cod_invitacion' => '0',
        //         'id_usuario' => 1,
        //     ], [
        //         'email' => 'godswindregistro@gmail.com',
        //         'cod_invitacion' => '1',
        //         'id_usuario' => 2,
        //     ], [
        //         'email' => 'godswind@outlook.com.com',
        //         'cod_invitacion' => '2',
        //         'id_usuario' => 3,
        //     ]
        // ]);

        DatosUsuario::factory(5)
            ->create()
            ->each(function ($du) {
                $faker = Faker::create();
                $condiciones = Condicion::all()->random(1)->pluck('id');
                $du->condiciones()->attach(
                    $condiciones,
                    [
                        'aceptado' => $faker->randomElement([0, 1])
                    ]
                );
            });

        // DatosUsuario::factory()->count(3)->create();
        // DatosUsuario::factory()->has(Condicion::factory()->count(1))->create();
    }
}
