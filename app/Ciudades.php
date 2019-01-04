<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudades extends Model
{

    protected $table = "ciudades";
    protected $fillable = [
        'estado_id',
        'nombre',
    ];

    public function estado(){
        return $this->belongsTo(Estados::class);
    }
}
