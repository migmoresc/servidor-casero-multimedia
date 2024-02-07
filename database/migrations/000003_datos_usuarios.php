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
        Schema::create('datos_usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('email', 30)->unique();
            $table->timestamp('email_verificado_fecha')->nullable();
            $table->string('cod_invitacion', 6)->unique();
            $table->smallInteger('num_inv_restantes')->nullable();
            $table->ipAddress('ip_de_registro')->nullable();
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
        Schema::dropIfExists('datos_usuarios');
    }
};
