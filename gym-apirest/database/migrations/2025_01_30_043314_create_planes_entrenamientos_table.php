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
        Schema::create('planesentrenamiento', function (Blueprint $table) {
            $table->id('id_plan');
            $table->unsignedBigInteger('id_entrenador');
            $table->unsignedBigInteger('id_cliente');
            $table->string('nombre', 255);
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->foreign('id_entrenador')->references('id_usuario')->on('usuarios');
            $table->foreign('id_cliente')->references('id_usuario')->on('usuarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planesentrenamiento');
    }
};
