<?php

namespace App\Models;

use Database\Factories\PeliculaFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'peliculas';

    protected $fillable = ['nombre_pelicula', 'orden', 'id_datos_pelicula', 'file_path'];

    public function tipo()
    {
        return $this->morphOne('App\Models\Tipo', 'tipable');
    }

    public function datos_pelicula()
    {
        return $this->belongsTo('App\Models\Datos_pelicula', 'id_datos_pelicula', 'id');
    }

    public function archivo()
    {
        return $this->hasOneThrough('\App\Models\Archivo', '\App\Models\Tipo');
    }

    protected static function newFactory(): Factory
    {
        return PeliculaFactory::new();
    }
}
