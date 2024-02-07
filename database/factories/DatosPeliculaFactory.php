<?php

namespace Database\Factories;

use App\Models\Datos_pelicula;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DatosPeliculaFactory extends Factory
{
    protected $model = Datos_pelicula::class;
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
            'saga' => $this->faker->text(50)
        ];
    }
}
