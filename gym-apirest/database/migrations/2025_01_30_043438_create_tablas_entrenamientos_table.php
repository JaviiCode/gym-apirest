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
        Schema::create('tablasentrenamiento', function (Blueprint $table) {
            $table->id('id_tabla');
            $table->integer('semana');
            $table->string('nombre', 255);
            $table->integer('num_ejercicios');
            $table->integer('num_dias');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tablasentrenamiento');
    }
};
