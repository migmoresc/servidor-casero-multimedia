<?php

namespace Database\Factories;

use App\Models\Archivo;
use App\Models\Usuario;
use App\Models\Tipo;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Archivo>
 */
class ArchivoFactory extends Factory
{
    protected $model = Archivo::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nombre_archivo' => $this->faker->text(50),
            'file_path' => $this->faker->unique()->text(80),
            'tamaño' => $this->faker->randomFloat(2, 0, 999999),
            'privado' => $this->faker->randomElement([0, 1]),
            'ip' => $this->faker->ipv4(),
            'id_usuario' => Usuario::all()->random(1)->first()->id,
            'id_tipo' => Tipo::factory()->create(),
        ];
    }
}
