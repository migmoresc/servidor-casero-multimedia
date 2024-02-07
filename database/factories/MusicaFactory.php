<?php

namespace Database\Factories;

use App\Models\Musica;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Musica>
 */
class MusicaFactory extends Factory
{
    protected $model = Musica::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'artista' => $this->faker->text(24),
            'nombre_cancion' => $this->faker->text(24),
            'numero_cancion' => $this->faker->numberBetween(0, 127),
            'fecha_lanzamiento' => $this->faker->date('Y-m-d'),
            'duracion' => $this->faker->numberBetween(0, 32767),
            'letra' => $this->faker->text(),
            'colaboradores' => $this->faker->text(255)
        ];
    }
}
