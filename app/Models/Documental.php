<?php

namespace App\Models;

use Database\Factories\DocumentalFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Documental extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'documentales';

    protected $fillable = ['file_path', 'nombre_documental', 'genero_1'];

    public function tipo()
    {
        return $this->morphOne('App\Models\Tipo', 'tipable');
    }

    public function archivo()
    {
        return $this->hasOneThrough('\App\Models\Archivo', '\App\Models\Tipo');
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return DocumentalFactory::new();
    }
}
