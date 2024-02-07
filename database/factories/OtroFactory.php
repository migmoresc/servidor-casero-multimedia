<?php

namespace Database\Factories;

use App\Models\Otro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Otro>
 */
class OtroFactory extends Factory
{
    protected $model = Otro::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nombre_otro' => $this->faker->text(255),
        ];
    }
}
