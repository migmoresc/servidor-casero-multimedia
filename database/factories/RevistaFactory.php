<?php

namespace Database\Factories;

use App\Models\Revista;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Revista>
 */
class RevistaFactory extends Factory
{
    protected $model = Revista::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'fecha_publicacion' => $this->faker->date('Y-m-d'),
            'numero' => $this->faker->randomNumber(4, false),
        ];
    }
}
