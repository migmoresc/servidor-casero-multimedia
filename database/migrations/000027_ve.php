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
        Schema::create('ve', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('fecha_ultimo');
            $table->bigInteger('tiempo_pause')->nullable();
            $table->float('volumen')->nullable();
            $table->float('puntuacion', 2, 1)->nullable();
            $table->text('resumen')->nullable();
            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->unsignedBigInteger('id_archivo')->nullable();
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('set null');
            $table->foreign('id_archivo')->references('id')->on('archivos')->onDelete('set null');
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
        Schema::dropIfExists('ve');
    }
};
