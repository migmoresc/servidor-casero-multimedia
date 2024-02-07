<?php

namespace App\Models;

use Database\Factories\DatosMusicaFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

class Datos_musica extends Model
{
    use HasFactory;

    protected $table = 'datos_musica';

    protected $fillable = ['album', 'genero_1', 'genero_2'];

    public function musica()
    {
        return $this->hasMany('App\Models\Musica', 'id_datos_musica', 'id');
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return DatosMusicaFactory::new();
    }
}
