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
        Schema::create('estadisticasejercicio', function (Blueprint $table) {
            $table->id('id_estadistica');
            $table->unsignedBigInteger('id_ejercicio');
            $table->integer('num_sesiones');
            $table->decimal('tiempo_total', 5, 2);
            $table->decimal('duracion_media', 5, 2);
            $table->integer('sets_completados');
            $table->decimal('volumen_total', 5, 2);
            $table->integer('repeticiones_totales');
            $table->date('fecha_entrenamiento');
            $table->foreign('id_ejercicio')->references('id_ejercicio')->on('ejercicios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estadisticasejercicio');
    }
};
