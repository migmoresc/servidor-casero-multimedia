<?php

namespace Database\Factories;

use App\Models\Pelicula;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelicula>
 */
class PeliculaFactory extends Factory
{
    protected $model = Pelicula::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //

            'nombre_pelicula' => $this->faker->text(50),
            'orden' => $this->faker->numberBetween(0, 127),
            'director' => $this->faker->text(24),
            'fecha_lanzamiento' => $this->faker->date('Y-m-d'),
            'duracion' => $this->faker->randomNumber(),
            'reparto' => $this->faker->text(255),
            'sinopsis' => $this->faker->text(),
            'puntuacion' => $this->faker->randomFloat(1, 0, 5),
            'presupuesto' => $this->faker->randomNumber(),
            'ingresos_taquilla' => $this->faker->randomNumber(),
            'productora' => $this->faker->text(24),
            'distribuidora' => $this->faker->text(24),
            'premios' => $this->faker->text(255),
            'precuela' => $this->faker->randomNumber(),
            'secuela' => $this->faker->randomNumber(),
            'banda_sonora' => $this->faker->randomNumber(),
            'ubicaciones' => $this->faker->text(255),
            'calificacion_edades' => $this->faker->randomElement(['+21', '+18', '+15', '+13', '+7', 'Baby']),
            'criticas' => $this->faker->text(),
            'popularidad' => $this->faker->numberBetween(0, 10),
        ];
    }
}
