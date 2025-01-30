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
        Schema::create('series', function (Blueprint $table) {
            $table->id('id_serie');
            $table->integer('repeticiones_min');
            $table->integer('repeticiones_max');
            $table->decimal('peso', 5, 2);
            $table->decimal('duracion', 5, 2);
            $table->decimal('descanso', 5, 2);
            $table->unsignedBigInteger('id_ejercicio');
            $table->unsignedBigInteger('id_tabla');
            $table->unsignedBigInteger('id_tipo_serie');
            $table->foreign('id_tabla')->references('id_tabla')->on('tablasentrenamiento');
            $table->foreign('id_tipo_serie')->references('id_tipo_serie')->on('tiposerie');
            $table->foreign('id_ejercicio')->references('id_ejercicio')->on('ejercicios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('series');
    }
};
