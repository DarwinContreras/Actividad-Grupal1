<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTablaPersonas2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personas', function (Blueprint $table) {
            $table->time('lunes_inicio')->nullable();
            $table->time('lunes_fin')->nullable();
            $table->time('martes_inicio')->nullable();
            $table->time('martes_fin')->nullable();
            $table->time('miercoles_inicio')->nullable();
            $table->time('miercoles_fin')->nullable();
            $table->time('jueves_inicio')->nullable();
            $table->time('jueves_fin')->nullable();
            $table->time('viernes_inicio')->nullable();
            $table->time('viernes_fin')->nullable();
            $table->time('sabado_inicio')->nullable();
            $table->time('sabado_fin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personas', function (Blueprint $table) {
            $table->dropColumn('lunes_inicio');
            $table->dropColumn('lunes_fin');
            $table->dropColumn('martes_inicio');
            $table->dropColumn('martes_fin');
            $table->dropColumn('miercoles_inicio');
            $table->dropColumn('miercoles_fin');
            $table->dropColumn('jueves_inicio');
            $table->dropColumn('jueves_fin');
            $table->dropColumn('viernes_inicio');
            $table->dropColumn('viernes_fin');
            $table->dropColumn('sabado_inicio');
            $table->dropColumn('sabado_fin');
        });
    }
}
