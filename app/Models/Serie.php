<?php

namespace App\Models;

use Database\Factories\SerieFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Serie extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'series';

    protected $fillable = ['id_datos_serie', 'file_path', 'numero_temporada', 'numero_episodio'];

    public function tipo()
    {
        return $this->morphOne('App\Models\Tipo', 'tipable');
    }

    public function datos_serie()
    {
        return $this->belongsTo('App\Models\Datos_serie', 'id_datos_serie', 'id');
    }

    protected static function newFactory(): Factory
    {
        return SerieFactory::new();
    }
}
