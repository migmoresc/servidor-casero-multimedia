<?php

namespace Database\Factories;

use App\Models\Datos_revista;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DatosRevistaFactory extends Factory
{
    protected $model = Datos_revista::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'tema' => $this->faker->randomElement(['Prensa rosa', 'Prensa amarilla', 'Noticias', 'Actualidad', 'Deportes', 'Ciencia', 'Curiosidades', 'Infantil', 'Coleccionable', 'Informática', 'Adulto']),
            'nombre_revista' => $this->faker->text(24),
            'editorial' => $this->faker->text(24),
            'issn' => $this->faker->randomNumber(8, true),
            'frecuencia' => $this->faker->randomElement(['mensual', 'anual', 'diario', 'quincenal']),
            'audiencia' => $this->faker->randomElement(['+7', '+13', '+15', '+18', '0-7', 'baby']),
            'precio' => $this->faker->randomNumber(3, false),
            'web' => $this->faker->text(255),
        ];
    }
}
