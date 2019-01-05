<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBolsaTrabajoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bolsa_tablajo', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('empresa_id');
            $table->unsignedInteger('area_id');
            $table->unsignedInteger('ciudad_id');
            $table->unsignedInteger('sexo_id');
            $table->string('puesto')->nullable()->nullable();
            $table->string('tipo')->nullable()->nullable();
            $table->dateTime('fecha')->nullable();
            $table->string('descripcion',5000)->nullable();
            $table->string('requisitos',5000)->nullable();
            $table->string('contracto')->nullable();
            $table->string('telefono',100)->nullable();
            $table->string('email',100)->nullable();
            $table->string('domicilio')->nullable();
            $table->string('sueldo')->nullable();
            $table->string('estado')->nullable();
            $table->string('imagen')->nullable();
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
        Schema::dropIfExists('bolsa_tablajo');
    }
}
