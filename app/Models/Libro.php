<?php

namespace App\Models;

use Database\Factories\LibroFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Libro extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'libros';

    protected $fillable = ['nombre_libro', 'orden', 'file_path', 'id_datos_libro'];

    public function tipo()
    {
        return $this->morphOne('App\Models\Tipo', 'tipable');
    }

    public function datos_libro()
    {
        return $this->belongsTo('App\Models\Datos_libro', 'id_datos_libro', 'id');
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return LibroFactory::new();
    }
}
