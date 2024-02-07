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
        Schema::create('archivos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('file_path', 80);
            $table->string('nombre_archivo', 50);
            $table->float('tamaño');
            $table->boolean('privado');
            $table->unsignedBigInteger('ultimo_modificado')->nullable();
            $table->unsignedBigInteger('penultimo_modificado')->nullable();
            $table->ipAddress('ip')->nullable();
            $table->unsignedBigInteger('id_tipo');
            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('set null');
            $table->foreign('id_tipo')->references('id')->on('tipos');
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
        Schema::dropIfExists('archivos');
    }
};
