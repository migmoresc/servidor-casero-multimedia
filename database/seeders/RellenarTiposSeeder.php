<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RellenarTiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('datos_pelicula')->insert([
            'id' => 1,
            'genero_1' => null,
            'genero_2' => null,
            'genero_3' => null,
            'saga' => 'marvel'
        ]);

        DB::table('peliculas')->insert([
            'id' => 1,
            'nombre' => 'avengers',
            'orden' => 1,
            'id_datos_pelicula' => 1
        ]);

        DB::table('tipos')->insert([
            'tipable_id' => 1,
            'tipable_type' => 'App\Models\Pelicula'
        ]);

        DB::table('programas')->insert([
            'id' => 1,
            'nombre' => 'office',
        ]);

        DB::table('tipos')->insert([
            'tipable_id' => 1,
            'tipable_type' => 'App\Models\Programa'
        ]);

        DB::table('datos_musica')->insert([
            'id' => 1,
            'genero_1' => 'pop',
            'genero_2' => 'solo',
            'genero_3' => 'otros',
            'artista' => 'shakira',
            'discografia' => 'loba'
        ]);

        DB::table('musica')->insert([
            'id' => 1,
            'numero_cancion' => 1,
            'id_datos_musica' => 1
        ]);

        DB::table('tipos')->insert([
            'tipable_id' => 1,
            'tipable_type' => 'App\Models\Musica'
        ]);

        DB::table('datos_libro')->insert([
            'id' => 1,
            'genero_1' => 'ficcion',
            'genero_2' => 'fantasia',
            'genero_3' => 'masculino',
            'coleccion' => 'harry potter',
            'autor' => 'jk rowling'
        ]);

        DB::table('libros')->insert([
            'nombre' => 'harry poter y la piedra filosofal',
            'orden' => 1,
            'id_datos_libro' => 1
        ]);

        DB::table('tipos')->insert([
            'tipable_id' => 1,
            'tipable_type' => 'App\Models\Libro'
        ]);

        DB::table('datos_serie')->insert([
            'id' => 1,
            'genero_1' => 'comedia',
            'genero_2' => 'grupal',
            'genero_3' => 'animada',
            'nombre_serie' => 'futurama'
        ]);

        DB::table('series')->insert([
            'id' => 1,
            'numero_temporada' => 1,
            'numero_episodio' => 1,
            'id_datos_serie' => 1
        ]);

        DB::table('tipos')->insert([
            'tipable_id' => 1,
            'tipable_type' => 'App\Models\Serie'
        ]);

        DB::table('documentales')->insert([
            'id' => 1,
            'genero_1' => 'naturaleza'
        ]);

        DB::table('tipos')->insert([
            'tipable_id' => 1,
            'tipable_type' => 'App\Models\Documental'
        ]);

        DB::table('datos_revista')->insert([
            'id' => 1,
            'genero_1' => 'corazon',
            'genero_2' => 'amarilla',
            'genero_3' => null,
            'nombre' => 'hola'
        ]);

        DB::table('revistas')->insert([
            'id' => 1,
            'año' => 2000,
            'mes' => 1,
            'id_datos_revista' => 1
        ]);

        DB::table('tipos')->insert([
            'tipable_id' => 1,
            'tipable_type' => 'App\Models\Revista'
        ]);

        DB::table('datos_video')->insert([
            'id' => 1,
            'genero_1' => 'youtube',
            'genero_2' => 'varo',
            'genero_3' => 'pc',
            'lista' => 'monitores',
            'autor' => 'rincon de varo'
        ]);

        DB::table('videos')->insert([
            'id' => 1,
            'numero_video' => 1,
            'id_datos_video' => 1
        ]);

        DB::table('tipos')->insert([
            'tipable_id' => 1,
            'tipable_type' => 'App\Models\Video'
        ]);

        DB::table('otros')->insert([
            'id' => 1,
        ]);

        DB::table('tipos')->insert([
            'tipable_id' => 1,
            'tipable_type' => 'App\Models\Otro'
        ]);

        //rellenar otras tablas tb
        DB::table('datos_usuarios_condiciones')->insert([
            'aceptado' => 1,
            'id_datos_usuario' => 1,
            'id_condicion' => 1
        ]);

        DB::table('ve')->insert([
            'fecha_ultimo' => '2020-01-01',
            'tiempo_pause' => 0,
            'volumen' => 0,
            'puntuacion' => null,
            'resumen' => null,
            'id_usuario' => 1,
            'id_archivo' => 1
        ]);
    }
}
