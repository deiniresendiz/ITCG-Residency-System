<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudades extends Model
{

    protected $table = "ciudades";
    protected $fillable = [
        'nombre',
    ];

    public function estado(){
        return $this->belongsTo(Estados::class);
    }
}
