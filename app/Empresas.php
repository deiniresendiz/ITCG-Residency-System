<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{


    protected $table = "empresas";
    protected $fillable = [
        'ciudad_id',
        'nombre',
        'descripcion',
        'domicilio',
        'telefono',
        'contacto',
        'nombre',
        'imagen',
    ];

    public function ciudad(){
        return $this->belongsTo(Ciudades::class);
    }

}
