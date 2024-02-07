<?php

namespace Database\Factories;

use App\Models\Datos_video;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DatosVideoFactory extends Factory
{
    protected $model = Datos_video::class;
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
            'lista' => $this->faker->text(32),
            'autor' => $this->faker->text(32),
        ];
    }
}
