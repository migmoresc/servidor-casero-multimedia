<?php

namespace Database\Factories;

use App\Models\Datos_serie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DatosSerieFactory extends Factory
{
    protected $model = Datos_serie::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'genero_1' => $this->faker->randomElement(['Comedia', 'Drama', 'Suspense', 'Acción', 'Aventuras', 'Ciencia ficción', 'No ficción', 'Fantasía', 'Musical', 'Terror', 'Cine mudo', 'Película 3D', 'Animación', 'Religiosa', 'Futurista', 'Policíaca', 'Crimen', 'Bélica', 'Histórica', 'Deportiva', 'Western']),
            'genero_2' => $this->faker->randomElement(['Comedia', 'Drama', 'Suspense', 'Acción', 'Aventuras', 'Ciencia ficción', 'No ficción', 'Fantasía', 'Musical', 'Terror', 'Cine mudo', 'Película 3D', 'Animación', 'Religiosa', 'Futurista', 'Policíaca', 'Crimen', 'Bélica', 'Histórica', 'Deportiva', 'Western']),
            'genero_3' => $this->faker->randomElement(['Comedia', 'Drama', 'Suspense', 'Acción', 'Aventuras', 'Ciencia ficción', 'No ficción', 'Fantasía', 'Musical', 'Terror', 'Cine mudo', 'Película 3D', 'Animación', 'Religiosa', 'Futurista', 'Policíaca', 'Crimen', 'Bélica', 'Histórica', 'Deportiva', 'Western']),
            'nombre_serie' => $this->faker->text(50),
            'creador' => $this->faker->text(24),
            'fecha_lanzamiento' => $this->faker->date('Y-m-d'),
            'numero_temporadas' => $this->faker->numberBetween(0, 127),
            'numero_episodios' => $this->faker->numberBetween(0, 32767),
            'reparto' => $this->faker->text(255),
            'sinopsis' => $this->faker->text(),
            'calificacion_edades' => $this->faker->numberBetween(0, 21),
            'cadena_tv' => $this->faker->text(24),
            'plataforma_streaming' => $this->faker->text(24),
            'puntuacion' => $this->faker->randomFloat(1, 0, 5),
            'premios' => $this->faker->text(255),
            'popularidad' => $this->faker->numberBetween(0, 10),
            'estudio_produccion' => $this->faker->text(24),
            'episodios_destacados' => $this->faker->text(255),
            'ubicaciones' => $this->faker->text(255),
            'precuela' => $this->faker->randomNumber(),
            'secuela' => $this->faker->randomNumber(),
            'fecha_finalizacion' => $this->faker->date('Y-m-d'),
            'spin_offs' => $this->faker->text(255),
        ];
    }
}
