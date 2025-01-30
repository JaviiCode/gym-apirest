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
        Schema::create('planestablaentrenamientos', function (Blueprint $table) {
            $table->id('id_plan_tabla');
            $table->unsignedBigInteger('id_plan');
            $table->unsignedBigInteger('id_tabla');
            $table->foreign('id_plan')->references('id_plan')->on('planesentrenamiento');
            $table->foreign('id_tabla')->references('id_tabla')->on('tablasentrenamiento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planestablaentrenamientos');
    }
};
