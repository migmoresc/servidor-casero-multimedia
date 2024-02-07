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
        Schema::create('libros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_libro')->unique();
            $table->tinyInteger('orden')->nullable();
            $table->string('autor', 32)->nullable();
            $table->date('fecha_publicacion')->nullable();
            $table->smallInteger('numero_paginas')->nullable();
            $table->string('editorial', 24)->nullable();
            $table->string('isbn', 32)->nullable();
            $table->longText('sinopsis')->nullable();
            $table->string('reseñas')->nullable();
            $table->float('puntuacion', 2, 1)->nullable();
            $table->string('premios')->nullable();
            $table->string('formato', 24)->nullable();
            $table->string('idioma', 16)->nullable();
            $table->tinyInteger('edicion')->nullable();
            $table->string('ubicacion', 24)->nullable();
            $table->longText('biografia_autor')->nullable();
            $table->string('file_path', 80)->nullable();
            $table->unsignedBigInteger('id_datos_libro')->nullable();
            $table->foreign('id_datos_libro')->references('id')->on('datos_libro')->onDelete('set null');
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
        Schema::dropIfExists('libros');
    }
};
