<?php

namespace App;

use Exception;
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
        'imagen',
    ];

    public function ciudad(){
        try{
            return $this->belongsTo(Ciudades::class);
        }catch (Exception $e){
            return null;
        }
    }

    public function estado_id(){
        return $this->ciudad()->select(['estado_id']);
    }

    public function scopeNombre($query, $nombre){
        if ($nombre)
            return $query->orWhere('nombre', 'LIKE' ,"%$nombre%");

    }

    public function scopeCiudad($query, $ciudad){
        if ($ciudad)
            return $query->where('ciudad_id', $ciudad);
    }

}
