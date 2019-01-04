<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Egresados extends Model
{

    protected $table = "egresados";
    protected $fillable = [
        'carreara_id',
        'estado_civi_id',
        'ciudad_id',
        'sexo_id',
        'no_control',
        'nombre',
        'nacimiento',
        'curp',
        'telefono',
        'celular',
        'email',
        'fecha_egreso',
        'promedio',
        'imagen'
    ];

    protected $dates = ['nacimiento','fecha_egreso'];

    public function carrera(){
        return $this->belongsTo(Carreras::class);
    }
    public function estadoCivil(){
        return $this->belongsTo(EstadoCivil::class);
    }
    public function ciudad(){
        return $this->belongsTo(Ciudades::class);
    }
    public function sexo(){
        return $this->belongsTo(Sexo::class);
    }

}
