<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IdiomaDetalle extends Model
{


    protected $table = "idioma_detalle";
    protected $fillable = [
        'idioma_id',
        'egresado_id',
    ];


    public function idioma(){
        return $this->belongsTo(Idiomas::class);
    }
    public function egresado(){
        return $this->belongsTo(Egresados::class);
    }
}
