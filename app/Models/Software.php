<?php

namespace App\Models;

use Database\Factories\SoftwareFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Software extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'softwares';

    protected $fillable = ['nombre_software', 'file_path'];

    public function tipo()
    {
        return $this->morphOne('App\Models\Tipo', 'tipable');
    }

    protected static function newFactory(): Factory
    {
        return SoftwareFactory::new();
    }
}
