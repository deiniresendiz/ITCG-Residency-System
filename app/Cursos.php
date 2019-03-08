<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{

    protected $table = "cursos";
    protected $fillable = [
        'nombre',
        'descripcion',
        'instructor',
        'lugar',
        'fecha_inicio',
        'fecha_final',
        'precio',
        'estado',
        'imagen',
    ];

    protected $dates = ['fecha_inicio','fecha_final'];
    /**
     *Metodo para actualizar el estado de los cursos
     *
     */

    public function scopeNombre($query, $nombre){
        if ($nombre)
            return $query->where('nombre', $nombre);
    }
    public function scopeEstado($query, $estado){
        if ($estado)
            return $query->where('estado', $estado);
    }

}
