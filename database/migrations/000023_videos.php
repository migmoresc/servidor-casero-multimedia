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
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('numero_video')->nullable();
            $table->string('nombre_video')->unique();
            $table->smallInteger('duracion')->nullable();
            $table->string('file_path', 80)->nullable();
            $table->float('puntuacion', 2, 1)->nullable();
            $table->unsignedBigInteger('id_datos_video')->nullable();
            $table->foreign('id_datos_video')->references('id')->on('datos_video')->onDelete('set null');
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
        Schema::dropIfExists('videos');
    }
};
