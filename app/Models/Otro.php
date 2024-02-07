<?php

namespace App\Models;

use Database\Factories\OtroFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Otro extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'otros';

    protected $fillable = ['file_path', 'nombre_otro'];

    public function tipo()
    {
        return $this->morphOne('App\Models\Tipo', 'tipable');
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return OtroFactory::new();
    }
}
