<?php

namespace Database\Factories;

use App\Models\Datos_anime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DatosAnimeFactory extends Factory
{
    protected $model = Datos_anime::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'genero_1' => $this->faker->randomElement(['Shonen', 'Shojo', 'Seinen', 'Josei', 'Kodomomuke', 'Isekai', 'Mecha', 'Fantasía', 'Ciencia ficción', 'Romance', 'Slice of life', 'Comedia', 'Drama', 'Aventuras', 'Horror', 'Supernatural', 'Misterio', 'Psicológico', 'Historical', 'Musical', 'Yaoi', 'Yuri', 'Deportivo', 'Ninjas', 'Pelea']),
            'genero_2' => $this->faker->randomElement(['Shonen', 'Shojo', 'Seinen', 'Josei', 'Kodomomuke', 'Isekai', 'Mecha', 'Fantasía', 'Ciencia ficción', 'Romance', 'Slice of life', 'Comedia', 'Drama', 'Aventuras', 'Horror', 'Supernatural', 'Misterio', 'Psicológico', 'Historical', 'Musical', 'Yaoi', 'Yuri', 'Deportivo', 'Ninjas', 'Pelea']),
            'genero_3' => $this->faker->randomElement(['Shonen', 'Shojo', 'Seinen', 'Josei', 'Kodomomuke', 'Isekai', 'Mecha', 'Fantasía', 'Ciencia ficción', 'Romance', 'Slice of life', 'Comedia', 'Drama', 'Aventuras', 'Horror', 'Supernatural', 'Misterio', 'Psicológico', 'Historical', 'Musical', 'Yaoi', 'Yuri', 'Deportivo', 'Ninjas', 'Pelea']),
            'nombre_anime' => $this->faker->text(32),
            'estudio_animacion' => $this->faker->text(64),
            'director' => $this->faker->text(32),
            'fecha_emision' => $this->faker->date('Y-m-d'),
            'numero_temporadas' => $this->faker->numberBetween(0, 127),
            'numero_episodios' => $this->faker->numberBetween(0, 32767),
            'sinopsis' => $this->faker->text(),
            'puntuacion' => $this->faker->randomFloat(1, 0, 5),
            'popularidad' => $this->faker->numberBetween(0, 10)
        ];
    }
}
