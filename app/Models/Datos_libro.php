<?php

namespace App\Models;

use Database\Factories\DatosLibroFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

class Datos_libro extends Model
{
    use HasFactory;

    protected $table = 'datos_libro';

    protected $fillable = ['coleccion', 'genero_1', 'genero_2', 'genero_3'];

    public function libros()
    {
        return $this->hasMany('App\Models\Libro', 'id_datos_libro', 'id');
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return DatosLibroFactory::new();
    }
}
