<?php

namespace Database\Factories;

use App\Models\Tipo;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tipo>
 */
class TipoFactory extends Factory
{
    protected $model = Tipo::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tabla = $this->faker->randomElement(['App\Models\Otro', 'App\Models\Documental', 'App\Models\Software', 'App\Models\Musica', 'App\Models\Serie', 'App\Models\Pelicula', 'App\Models\Libro', 'App\Models\Anime', 'App\Models\Revista', 'App\Models\Video']);

        return [
            //
            'tipable_type' => $tabla,
            'tipable_id' => get_class(new $tabla)::all()->random(1)->first()->id,
        ];
    }
}
