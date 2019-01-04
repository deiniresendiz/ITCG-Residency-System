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

}
