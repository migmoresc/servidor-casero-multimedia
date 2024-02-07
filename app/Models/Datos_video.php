<?php

namespace App\Models;

use Database\Factories\DatosVideoFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

class Datos_video extends Model
{
    use HasFactory;

    protected $table = 'datos_video';

    protected $fillable = ['lista', 'genero_1'];

    public function videos()
    {
        return $this->hasMany('App\Models\Video', 'id_datos_video', 'id');
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return DatosVideoFactory::new();
    }
}
