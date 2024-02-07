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
        Schema::create('peliculas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_pelicula', 50)->unique();
            $table->tinyInteger('orden')->nullable();
            $table->string('director', 24)->nullable();
            $table->date('fecha_lanzamiento')->nullable();
            $table->integer('duracion')->nullable();
            $table->string('reparto')->nullable();
            $table->longText('sinopsis')->nullable();
            $table->float('puntuacion', 2, 1)->nullable();
            $table->integer('presupuesto')->nullable();
            $table->integer('ingresos_taquilla')->nullable();
            $table->string('productora', 24)->nullable();
            $table->string('distribuidora', 24)->nullable();
            $table->string('premios')->nullable();
            $table->unsignedBigInteger('precuela')->nullable();
            $table->unsignedBigInteger('secuela')->nullable();
            $table->unsignedBigInteger('banda_sonora')->nullable();
            $table->string('ubicaciones')->nullable();
            $table->text('calificacion_edades', 16)->nullable();
            $table->longText('criticas')->nullable();
            $table->tinyInteger('popularidad')->nullable();
            $table->string('file_path', 80)->nullable();
            $table->string('image_path', 80)->nullable();
            $table->unsignedBigInteger('id_datos_pelicula')->nullable();
            $table->foreign('id_datos_pelicula')->references('id')->on('datos_pelicula')->onDelete('set null');
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
        Schema::dropIfExists('peliculas');
    }
};
