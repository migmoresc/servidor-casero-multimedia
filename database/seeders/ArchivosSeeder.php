<?php

namespace Database\Seeders;

use App\Models\Archivo;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArchivosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // DB::table('archivos')->insert([
        //     'path' => 'public/a.mp4',
        //     'nombre' => 'Boruto',
        //     'tamaño' => 50.5,
        //     'privado' => 0,
        //     'ultimo_modificado' => 1,
        //     'penultimo_modificado' => 1,
        //     'id_tipo' => 1,
        //     'id_usuario' => 1
        // ]);

        Archivo::factory()->count(100)->create();
    }
}
