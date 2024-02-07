<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Usuario;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DatosUsuario>
 */
class DatosUsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'email' => $this->faker->email(30),
            'cod_invitacion' => $this->faker->text(6),
            'ip_de_registro' => $this->faker->ipv4,
            'id_usuario' => Usuario::factory()->create()->id
        ];
    }
}
