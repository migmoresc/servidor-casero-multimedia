<?php

namespace App\Models;

use Database\Factories\AnimeFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anime extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'animes';

    protected $fillable = ['id_datos_anime', 'numero_temporada', 'numero_episodio', 'file_path'];

    public function tipo()
    {
        return $this->morphOne('App\Models\Tipo', 'tipable');
    }

    public function datos_anime()
    {
        return $this->belongsTo('App\Models\Datos_anime', 'id_datos_anime', 'id');
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return AnimeFactory::new();
    }
}
