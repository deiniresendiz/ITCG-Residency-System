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
        'requisitos',
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

    public function estado_id(){
        return $this->ciudad()->select(['estado_id']);
    }

    //scope

    public function scopeName($query, $puesto){
        if ($puesto)
            return $query->where('puesto', 'LIKE' ,"%$puesto%");

    }

    public function scopeTown($query, $ciudad){
        if ($ciudad)
            return $query->where('ciudad_id', $ciudad);
    }

    public function scopeAreat($query, $area){
        if ($area)
            return $query->where('area_id', $area);
    }
    public function scopeEmpresas($query, $empresa){
        if ($empresa)
            return $query->where('empresa_id', $empresa);
    }
}


