<?php

namespace App\Models;

use Database\Factories\TipoFactory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;

    protected $table = 'tipos';

    public function tipable()
    {
        return $this->morphTo();
    }

    public function archivo()
    {
        return $this->hasOne('App\Models\Archivo', 'id_tipo', 'id');
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return TipoFactory::new();
    }
}
