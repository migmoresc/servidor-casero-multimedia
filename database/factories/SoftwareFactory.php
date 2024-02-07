<?php

namespace Database\Factories;

use App\Models\Software;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Programa>
 */
class SoftwareFactory extends Factory
{
    protected $model = Software::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nombre_software' => $this->faker->text(50),
            'tamaño' => $this->faker->numberBetween(0, 32767),
            'descripcion' => $this->faker->text(255),
        ];
    }
}
