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
        Schema::create('usuarios_verificados', function (Blueprint $table) {
            $table->id();
            $table->string('url_verificado');
            $table->unsignedBigInteger('id_usuario')->unique()->nullable();
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('set null');
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
        Schema::dropIfExists('usuarios_verificados');
    }
};
