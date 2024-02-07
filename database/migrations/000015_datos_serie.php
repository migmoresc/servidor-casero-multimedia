<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('datos_serie', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('genero_1', 24)->nullable();
            $table->string('genero_2', 24)->nullable();
            $table->string('genero_3', 24)->nullable();
            $table->string('nombre_serie', 50)->unique();
            $table->string('creador', 24)->nullable();
            $table->date('fecha_lanzamiento')->nullable();
            $table->tinyInteger('numero_temporadas')->nullable();
            $table->smallInteger('numero_episodios')->nullable();
            $table->string('reparto')->nullable();
            $table->longText('sinopsis')->nullable();
            $table->tinyInteger('calificacion_edades')->nullable();
            $table->string('cadena_tv', 24)->nullable();
            $table->string('plataforma_streaming', 24)->nullable();
            $table->float('puntuacion', 2, 1)->nullable();
            $table->string('premios')->nullable();
            $table->tinyInteger('popularidad')->nullable();
            $table->string('estudio_produccion', 24)->nullable();
            $table->string('episodios_destacados')->nullable();
            $table->string('ubicaciones')->nullable();
            $table->unsignedBigInteger('precuela')->nullable();
            $table->unsignedBigInteger('secuela')->nullable();
            $table->date('fecha_finalizacion')->nullable();
            $table->string('spin_offs')->nullable();
            $table->string('image_path', 80)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('datos_serie');
    }
};
