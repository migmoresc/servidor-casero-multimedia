<?php

namespace Database\Factories;

use App\Models\Datos_musica;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DatosMusicaFactory extends Factory
{
    protected $model = Datos_musica::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'genero_1' => $this->faker->randomElement(['Rock', 'Pop', 'Hip-Hop', 'Rap', 'Electrónica', 'Jazz', 'Blues', 'Country', 'R&B', 'Reggae', 'Clásica', 'Folk', 'Indie', 'Metal', 'Punk', 'Funk', 'Soul', 'Gospel', 'World music', 'Disco', 'Bluegrass', 'Ska', 'Punk rock', 'Grime', 'Trap', 'K-pop']),
            'genero_2' => $this->faker->randomElement(['Rock', 'Pop', 'Hip-Hop', 'Rap', 'Electrónica', 'Jazz', 'Blues', 'Country', 'R&B', 'Reggae', 'Clásica', 'Folk', 'Indie', 'Metal', 'Punk', 'Funk', 'Soul', 'Gospel', 'World music', 'Disco', 'Bluegrass', 'Ska', 'Punk rock', 'Grime', 'Trap', 'K-pop']),
            'album' => $this->faker->text(24),
            'discografica' => $this->faker->text(255),
        ];
    }
}
