<?php

namespace App\Models;

use Database\Factories\DatosUsuarioFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

class DatosUsuario extends Model
{
    use HasFactory;

    protected $table = 'datos_usuarios';

    public function usuario()
    {
        return $this->belongsTo('App\Models\Usuario', 'id_usuario', 'id');
    }

    public function condiciones()
    {
        return $this->belongsToMany('App\Models\Condicion', 'datos_usuarios_condiciones', 'id_datos_usuario', 'id_condicion');
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return DatosUsuarioFactory::new();
    }
}
