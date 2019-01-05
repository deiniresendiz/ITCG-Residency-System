<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudios extends Model
{

    protected $table = "estudios";
    protected $fillable = [
        'egresado_id',
        'posgrado_id',
        'instituto',
        'nivel',
        'fecha_inicio',
        'fecha_final',
        'descripcion',
    ];

    protected $dates = ['fecha_inicio','fecha_final'];

    public function egresado(){
        return $this->belongsTo(Egresados::class);
    }
    public function posgrados(){
        return $this->belongsTo(Prosgrados::class);
    }
}
