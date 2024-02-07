<?php

namespace App\Models;

use Database\Factories\CondicionesFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

class Condicion extends Model
{
    use HasFactory;

    protected $table = 'condiciones';

    public function datos_usuarios()
    {
        return $this->belongsToMany('App\Models\DatosUsuario', 'datos_usuarios_condiciones', 'id_condicion', 'id_datos_usuario');
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return CondicionesFactory::new();
    }
}
