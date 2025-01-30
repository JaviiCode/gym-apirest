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
        Schema::create('ejercicios', function (Blueprint $table) {
            $table->id('id_ejercicio');
            $table->string('nombre', 255);
            $table->unsignedBigInteger('id_tipo_musculo');
            $table->text('descripcion')->nullable();
            $table->foreign('id_tipo_musculo')->references('id_tipo_musculo')->on('tiposmusculo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ejercicios');
    }
};
