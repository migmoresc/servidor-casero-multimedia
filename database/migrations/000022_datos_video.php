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
        Schema::create('datos_video', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('genero_1', 24)->nullable();
            $table->string('lista', 32)->nullable();
            $table->string('autor', 32)->nullable();
            $table->string('image_path')->nullable();
            $table->float('puntuacion', 2, 1)->nullable();
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
        Schema::dropIfExists('datos_video');
    }
};
