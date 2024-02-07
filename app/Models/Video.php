<?php

namespace App\Models;

use Database\Factories\VideoFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'videos';

    protected $fillable = ['id_datos_video', 'file_path', 'nombre_video'];

    public function tipo()
    {
        return $this->morphOne('App\Models\Tipo', 'tipable');
    }

    public function datos_video()
    {
        return $this->belongsTo('App\Models\Datos_video', 'id_datos_video', 'id');
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return VideoFactory::new();
    }
}
