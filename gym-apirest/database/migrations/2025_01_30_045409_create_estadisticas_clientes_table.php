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
        Schema::create('estadisticascliente', function (Blueprint $table) {
            $table->id('id_estadistica_cliente');
            $table->decimal('peso', 5, 2);
            $table->decimal('altura', 5, 2);
            $table->decimal('grasa_corporal', 5, 2);
            $table->decimal('cintura', 5, 2);
            $table->decimal('pecho', 5, 2);
            $table->decimal('pierna', 5, 2);
            $table->decimal('biceps', 5, 2);
            $table->decimal('triceps', 5, 2);
            $table->unsignedBigInteger('id_cliente');
            $table->foreign('id_cliente')->references('id_usuario')->on('usuarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estadisticascliente');
    }
};
