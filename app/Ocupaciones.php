<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ocupaciones extends Model
{

    protected $table = "ocupaciones";
    protected $fillable = [
        'egresado_id',
        'empresa_id',
        'puesto',
        'descripcion',
        'lugar',
        'antiguedad',
    ];
    public function empresa(){
        return $this->belongsTo(Empresas::class);
    }
    public function egresado(){
        return $this->belongsTo(Egresados::class);
    }
}
