<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudios extends Model
{

    protected $table = "estudios";
    protected $fillable = [
        'egresado_id',
        'nivel_id',
        'posgrado_id',
        'instituto',
        'fecha_inicio',
        'fecha_final',
        'descripcion',
    ];

    protected $dates = ['fecha_inicio','fecha_final'];

    public function egresado(){
        return $this->belongsTo(Egresados::class);
    }
    public function nivel(){
        return $this->belongsTo(Niveles::class);
    }
    public function posgrados(){
        return $this->belongsTo(Prosgrados::class);
    }
}
