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
        Schema::create('documentales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_documental', 56);
            $table->string('genero_1')->nullable();
            $table->smallInteger('duracion')->nullable();
            $table->string('file_path', 80)->nullable();
            $table->string('image_path', 80)->nullable();
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
        Schema::dropIfExists('documentales');
    }
};
