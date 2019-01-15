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
            $table->unsignedInteger('carrera_id');
            $table->unsignedInteger('ciudad_id');
            $table->string('no_control');
            $table->string('nombre');
            $table->dateTime('nacimiento')->nullable();
            $table->string('curp')->nullable();
            $table->string('sexo')->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('telefono')->nullable();
            $table->string('celular')->nullable();
            $table->string('email')->nullable();
            $table->string('titulado',2)->nullable();
            $table->dateTime('fecha_egreso')->nullable();
            $table->float('promedio')->nullable();
            $table->string('imagen')->nullable();
            $table->string('password')->nullable();
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
