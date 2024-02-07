<?php

namespace App\Models;

use Database\Factories\DatosRevistaFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

class Datos_revista extends Model
{
    use HasFactory;

    protected $table = 'datos_revista';

    protected $fillable = ['nombre_revista', 'tema'];

    public function revistas()
    {
        return $this->hasMany('App\Models\Revista', 'id_datos_revista', 'id');
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return DatosRevistaFactory::new();
    }
}
