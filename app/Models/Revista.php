<?php

namespace App\Models;

use Database\Factories\RevistaFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Revista extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'revistas';

    protected $fillable = ['numero', 'id_datos_revista', 'file_path'];

    public function tipo()
    {
        return $this->morphOne('App\Models\Tipo', 'tipable');
    }

    public function datos_revista()
    {
        return $this->belongsTo('App\Models\Datos_revista', 'id_datos_revista', 'id');
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return RevistaFactory::new();
    }
}
