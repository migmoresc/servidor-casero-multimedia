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
        Schema::create('datos_usuarios_condiciones', function (Blueprint $table) {
            $table->id();
            $table->boolean('aceptado')->nullable();
            $table->unsignedBigInteger('id_datos_usuario')->nullable();
            $table->unsignedBigInteger('id_condicion')->nullable();
            $table->foreign('id_datos_usuario')->references('id')->on('datos_usuarios')->onDelete('set null');
            $table->foreign('id_condicion')->references('id')->on('condiciones')->onDelete('set null');
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
        Schema::dropIfExists('datos_usuarios_condiciones');
    }
};
