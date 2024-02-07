<?php

namespace Database\Factories;

use App\Models\Datos_libro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DatosLibroFactory extends Factory
{
    protected $model = Datos_libro::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'genero_1' => $this->faker->randomElement(['Comedia', 'Drama', 'Suspense', 'Acción', 'Aventuras', 'Ciencia ficción', 'No ficción', 'Fantasía', 'Novela', 'Terror', 'Prosa', 'Poesía', 'Animación', 'Religiosa', 'Futurista', 'Policíaca', 'Crimen', 'Bélica', 'Histórica', 'Deportiva', 'Western', 'Poema']),
            'genero_2' => $this->faker->randomElement(['Comedia', 'Drama', 'Suspense', 'Acción', 'Aventuras', 'Ciencia ficción', 'No ficción', 'Fantasía', 'Novela', 'Terror', 'Prosa', 'Poesía', 'Animación', 'Religiosa', 'Futurista', 'Policíaca', 'Crimen', 'Bélica', 'Histórica', 'Deportiva', 'Western', 'Poema']),
            'genero_3' => $this->faker->randomElement(['Comedia', 'Drama', 'Suspense', 'Acción', 'Aventuras', 'Ciencia ficción', 'No ficción', 'Fantasía', 'Novela', 'Terror', 'Prosa', 'Poesía', 'Animación', 'Religiosa', 'Futurista', 'Policíaca', 'Crimen', 'Bélica', 'Histórica', 'Deportiva', 'Western', 'Poema']),
            'coleccion' => $this->faker->text(32),
        ];
    }
}
