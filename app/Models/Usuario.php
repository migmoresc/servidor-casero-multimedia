<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use app\Models\Config;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable

{
    use HasFactory;
    use SoftDeletes;

    protected $table = "usuarios";
    protected $fillable = ['username', 'password'];
    protected $guarded = ['tipo'];

    public function usuario_verificado()
    {
        return $this->hasOne('App\Models\UsuarioVerificado', 'id_usuario', 'id');
    }

    public function config()
    {
        return $this->belongsTo('App\Models\Config', 'id_config', 'id');
    }

    public function datos_usuario()
    {
        return $this->hasOne('App\Models\DatosUsuario', 'id_usuario', 'id');
    }

    public function archivos_subidos()
    {
        return $this->hasMany('App\Models\Archivo', 'id_usuario', 'id');
    }

    public function archivos_vistos()
    {
        return $this->belongsToMany('App\Models\Archivo', 've', 'id_usuario', 'id_archivo');
    }
}
