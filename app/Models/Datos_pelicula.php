<?php

namespace App\Models;

use Database\Factories\DatosPeliculaFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

class Datos_pelicula extends Model
{
    use HasFactory;

    protected $table = 'datos_pelicula';

    protected $fillable = ['saga', 'genero_1', 'genero_2', 'genero_3'];

    public function peliculas()
    {
        return $this->hasMany('App\Models\Pelicula', 'id_datos_pelicula', 'id');
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return DatosPeliculaFactory::new();
    }
}
