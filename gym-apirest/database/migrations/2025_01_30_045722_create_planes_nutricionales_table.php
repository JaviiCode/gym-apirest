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
        Schema::create('planesnutricionales', function (Blueprint $table) {
            $table->id('id_plan_nutricional');
            $table->unsignedBigInteger('id_nutricionista');
            $table->unsignedBigInteger('id_cliente');
            $table->string('nombre', 255);
            $table->text('recomendaciones_dieta')->nullable();
            $table->decimal('porcentaje_carbohidratos', 5, 2);
            $table->decimal('porcentaje_proteinas', 5, 2);
            $table->decimal('porcentaje_grasas', 5, 2);
            $table->decimal('porcentaje_fibra', 5, 2);
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->foreign('id_nutricionista')->references('id_usuario')->on('usuarios');
            $table->foreign('id_cliente')->references('id_usuario')->on('usuarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planesnutricionales');
    }
};
