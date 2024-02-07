<?php

namespace Database\Factories;

use App\Models\Condicion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CondicionesFactory extends Factory
{
    protected $model = Condicion::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'texto' => $this->faker->text(20),
        ];
    }
}
