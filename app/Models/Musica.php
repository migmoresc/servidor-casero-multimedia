<?php

namespace App\Models;

use Database\Factories\MusicaFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Musica extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'musica';

    protected $fillable = ['nombre_cancion', 'id_datos_musica', 'file_path', 'numero_cancion', 'artista'];

    public function tipo()
    {
        return $this->morphOne('App\Models\Tipo', 'tipable');
    }

    public function datos_musica()
    {
        return $this->belongsTo('App\Models\Datos_musica', 'id_datos_musica', 'id');
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return MusicaFactory::new();
    }
}
