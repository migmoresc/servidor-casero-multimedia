<?php

namespace App\Models;

use Database\Factories\DatosAnimeFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

class Datos_anime extends Model
{
    use HasFactory;

    protected $table = 'datos_anime';

    protected $fillable = ['nombre_anime', 'genero_1', 'genero_2', 'genero_3'];

    public function animes()
    {
        return $this->hasMany('App\Models\Anime', 'id_datos_anime', 'id');
    }

    protected static function newFactory(): Factory
    {
        return DatosAnimeFactory::new();
    }
}
