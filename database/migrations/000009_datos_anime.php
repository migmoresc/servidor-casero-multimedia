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
        Schema::create('datos_anime', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('genero_1', 24)->nullable();
            $table->string('genero_2', 24)->nullable();
            $table->string('genero_3', 24)->nullable();
            $table->string('nombre_anime', 32)->unique();
            $table->string('image_path', 80)->nullable();
            $table->string('estudio_animacion', 64)->nullable();
            $table->string('director', 32)->nullable();
            $table->date('fecha_emision')->nullable();
            $table->tinyInteger('numero_temporadas')->nullable();
            $table->smallInteger('numero_episodios')->nullable();
            $table->longText('sinopsis')->nullable();
            $table->float('puntuacion', 2, 1)->nullable();
            $table->tinyInteger('popularidad')->nullable();
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
        Schema::dropIfExists('datos_anime');
    }
};
