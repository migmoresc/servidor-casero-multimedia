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
        Schema::create('softwares', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_software', 50);
            $table->smallInteger('tamaño')->nullable();
            $table->string('descripcion')->nullable();
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
        Schema::dropIfExists('softwares');
    }
};
