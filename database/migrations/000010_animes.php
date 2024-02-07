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
        Schema::create('animes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('numero_temporada');
            $table->smallInteger('numero_episodio');
            $table->string('file_path', 80)->nullable();
            $table->unsignedBigInteger('id_datos_anime')->nullable();
            $table->foreign('id_datos_anime')->references('id')->on('datos_anime')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['numero_temporada', 'numero_episodio', 'id_datos_anime']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('animes');
    }
};
