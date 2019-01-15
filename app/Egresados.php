<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Egresados extends Model
{

    protected $table = "egresados";
    protected $fillable = [
        'carrera_id',
        'ciudad_id',
        'no_control',
        'nombre',
        'sexo',
        'estado_civil',
        'nacimiento',
        'curp',
        'telefono',
        'celular',
        'email',
        'fecha_egreso',
        'promedio',
        'imagen',
        'password'
    ];

    protected $dates = ['nacimiento','fecha_egreso'];

    public function carrera(){
        return $this->belongsTo(Carreras::class);
    }
    public function ciudad(){
        return $this->belongsTo(Ciudades::class);
    }

}
