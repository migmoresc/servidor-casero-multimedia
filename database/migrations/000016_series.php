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
        Schema::create('series', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('numero_temporada');
            $table->smallInteger('numero_episodio');
            $table->unsignedBigInteger('id_datos_serie')->nullable();
            $table->string('file_path', 80)->nullable();
            $table->foreign('id_datos_serie')->references('id')->on('datos_serie')->onDelete('set null');
            $table->unique(['numero_temporada', 'numero_episodio', 'id_datos_serie']);
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
        Schema::dropIfExists('series');
    }
};
