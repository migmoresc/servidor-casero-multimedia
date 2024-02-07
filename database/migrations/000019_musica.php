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
        Schema::create('musica', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('artista', 24)->nullable();
            $table->string('nombre_cancion', 24);
            $table->tinyInteger('numero_cancion')->nullable();
            $table->date('fecha_lanzamiento')->nullable();
            $table->smallInteger('duracion')->nullable();
            $table->longText('letra')->nullable();
            $table->string('colaboradores')->nullable();
            $table->string('file_path', 80)->nullable();
            $table->float('puntuacion', 2, 1)->nullable();
            $table->unsignedBigInteger('id_datos_musica')->nullable();
            $table->foreign('id_datos_musica')->references('id')->on('datos_musica')->onDelete('set null');
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
        Schema::dropIfExists('musica');
    }
};
