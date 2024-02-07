<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioVerificado extends Model
{
    use HasFactory;

    protected $table = "usuarios_verificados";

    public function usuario()
    {
        return $this->belongsTo('App\Models\Usuario', 'id_usuario', 'id');
    }
}
