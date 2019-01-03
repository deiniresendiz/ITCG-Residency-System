<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEgresadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('egresados', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('carreara_id');
            $table->unsignedInteger('estado_civi_id');
            $table->unsignedInteger('ciudad_id');
            $table->unsignedInteger('sexo_id');
            $table->string('no_control');
            $table->string('nombre');
            $table->dateTime('nacimineto');
            $table->string('curp');
            $table->string('telefono');
            $table->string('celular');
            $table->string('email');
            $table->string('titulado',2);
            $table->dateTime('fecha_egreso');
            $table->float('promedio');
            $table->string('imagen');
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
        Schema::dropIfExists('egresados');
    }
}
