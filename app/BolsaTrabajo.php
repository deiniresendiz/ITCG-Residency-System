<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BolsaTrabajo extends Model
{
    protected $table = "bolsa_tablajo";
    protected $fillable = [
        'empresa_id',
        'area_id',
        'ciudad_id',
        'puesto',
        'tipo',
        'fecha',
        'descripcion',
        'contracto',
        'telefono',
        'email',
        'domicilio',
        'sueldo',
        'estado',
        'imagen',
    ];

    protected $dates = ['fecha'];

    public function empresa(){
        return $this->belongsTo(Empresas::class);
    }

    public function area(){
        return $this->belongsTo(AreaTrabajo::class);
    }

    public function ciudad(){
        return $this->belongsTo(Ciudades::class);
    }
}


