<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // DB::table('usuarios')->insert([
        //     'username' => 'miguel',
        //     'password' => Hash::make('miguel'),
        //     'tipo' => '0',
        //     'id_config' => '1'
        // ]);
        Usuario::create([
            'username' => 'miguel',
            'password' => Hash::make('miguel'),
            'tipo' => '0',
            'id_config' => '1'
        ]);

        // Usuario::factory(2)->create();
    }
}
