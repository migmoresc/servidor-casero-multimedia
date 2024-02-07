<?php

namespace App\Models;

use Database\Factories\DatosSerieFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

class Datos_serie extends Model
{
    use HasFactory;

    protected $table = 'datos_serie';

    protected $fillable = ['nombre_serie', 'genero_1', 'genero_2', 'genero_3'];

    public function series()
    {
        return $this->hasMany('App\Models\Serie', 'id_datos_serie', 'id');
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return DatosSerieFactory::new();
    }
}
