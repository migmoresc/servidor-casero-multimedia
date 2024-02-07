<?php

namespace App\Models;

use Database\Factories\ArchivoFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;

    protected $table = 'archivos';

    public function tipo()
    {
        return $this->belongsTo('App\Models\Tipo', 'id_tipo', 'id');
    }

    public function archivos_subidos()
    {
        return $this->belongsTo('App\Models\Usuario', 'id_usuario', 'id');
    }

    public function archivos_vistos()
    {
        return $this->belongsToMany('App\Models\Usuario', 've', 'id_archivo', 'id_usuario');
    }


    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return ArchivoFactory::new();
    }
}
