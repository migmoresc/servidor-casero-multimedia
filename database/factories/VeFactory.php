<?php

namespace Database\Factories;

use App\Models\Usuario;
use App\Models\Archivo;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'fecha_ultimo' => $this->faker->date(),
            'tiempo_pause' => $this->faker->randomNumber(),
            'volumen' => $this->faker->randomFloat(2, 0, 100),
            'puntuacion' => $this->faker->randomFloat(1, 0, 5),
            'resumen' => $this->faker->text(),
            'id_usuario' => Usuario::all()->random(1)->first()->id,
            'id_archivo' => Archivo::all()->random(1)->first()->id,
        ];
    }
}
