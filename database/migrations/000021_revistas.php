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
        Schema::create('revistas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_publicacion')->nullable();
            $table->smallInteger('numero')->nullable();
            $table->unsignedBigInteger('id_datos_revista')->nullable();
            $table->string('file_path', 80)->nullable();
            $table->float('puntuacion', 2, 1)->nullable();
            $table->foreign('id_datos_revista')->references('id')->on('datos_revista')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['numero', 'id_datos_revista']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('revistas');
    }
};
