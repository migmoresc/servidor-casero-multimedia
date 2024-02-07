<?php

namespace Database\Factories;

use App\Models\Libro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Libro>
 */
class LibroFactory extends Factory
{
    protected $model = Libro::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nombre_libro' => $this->faker->text(255),
            'orden' => $this->faker->numberBetween(0, 127),
            'autor' => $this->faker->text(32),
            'fecha_publicacion' => $this->faker->date(),
            'numero_paginas' => $this->faker->numberBetween(0, 32767),
            'editorial' => $this->faker->text(24),
            'isbn' => $this->faker->isbn10(),
            'sinopsis' => $this->faker->text(),
            'reseñas' => $this->faker->text(255),
            'puntuacion' => $this->faker->randomFloat(1, 0, 5),
            'premios' => $this->faker->text(255),
            'formato' => $this->faker->text(24),
            'idioma' => $this->faker->text(16),
            'edicion' => $this->faker->numberBetween(0, 127),
            'ubicacion' => $this->faker->text(24),
            'biografia_autor' => $this->faker->text(),
        ];
    }
}
