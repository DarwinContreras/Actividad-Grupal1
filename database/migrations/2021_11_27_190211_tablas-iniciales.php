<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablasIniciales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('identificador')->unique();
            $table->date('nacimiento');
            $table->string('codigo');
            $table->timestamps();
        });

        Schema::create('asistencia_personas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_persona')->references('id')->on('personas')->onUpdate('cascade')->onDelete('cascade');
            $table->dateTime('asistencia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asistencia_personas');
        Schema::dropIfExists('personas');
    }
}
