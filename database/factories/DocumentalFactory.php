<?php

namespace Database\Factories;

use App\Models\Documental;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Documental>
 */
class DocumentalFactory extends Factory
{
    protected $model = Documental::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nombre_documental' => $this->faker->text(56),
            'genero_1' => $this->faker->randomElement(['Comedia', 'Drama', 'Suspense', 'Acción', 'Aventuras', 'Ciencia ficción', 'No ficción', 'Fantasía', 'Novela', 'Terror', 'Prosa', 'Poesía', 'Animación', 'Religiosa', 'Futurista', 'Policíaca', 'Crimen', 'Bélica', 'Histórica', 'Deportiva', 'Western', 'Poema', 'Naturaleza', 'Paranormal']),
            'duracion' => $this->faker->numberBetween(0, 32767),
        ];
    }
}
