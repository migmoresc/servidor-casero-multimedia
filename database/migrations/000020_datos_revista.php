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
        Schema::create('datos_revista', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tema', 24)->nullable();
            $table->string('nombre_revista', 24)->unique();
            $table->string('editorial', 24)->nullable();
            $table->string('issn')->nullable();
            $table->string('frecuencia', 16)->nullable();
            $table->string('audiencia', 24)->nullable();
            $table->float('precio')->nullable();
            $table->string('web')->nullable();
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
        Schema::dropIfExists('datos_revista');
    }
};
