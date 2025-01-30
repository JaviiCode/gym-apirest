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
        Schema::create('perfilesusuario', function (Blueprint $table) {
            $table->id('id_perfil');
            $table->string('nombre', 100);
            $table->string('apellido1', 100);
            $table->string('apellido2', 100)->nullable();
            $table->integer('edad');
            $table->string('direccion', 255)->nullable();
            $table->string('telefono', 20)->nullable();
            $table->string('foto', 255)->nullable();
            $table->date('fecha_nacimiento');
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfilesusuario');
    }
};
