<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Egresados extends Model
{

    protected $table = "egresados";
    protected $fillable = [
        'carrera_id',
        'ciudad_id',
        'no_control',
        'nombre',
        'sexo',
        'estado_civil',
        'nacimiento',
        'curp',
        'telefono',
        'celular',
        'email',
        'fecha_egreso',
        'promedio',
        'imagen',
        'password'
    ];

    protected $dates = ['nacimiento','fecha_egreso'];

    public function ciudad(){
        return $this->belongsTo(Ciudades::class);
    }


    public static function carreras($id){
        return Carreras::where('id',$id)->first();
    }


    //Scope

    public function scopeCarrera($query, $carrera){
        if ($carrera)
            return $query->where('carrera_id', $carrera);
    }

    public function scopeNombre($query, $nombre){
        if ($nombre)
            return $query->orWhere('nombre', 'LIKE' ,"%$nombre%")->orWhere('no_control', 'LIKE' ,"%$nombre%");

    }

    public function scopeSexo($query, $sexo){
        if ($sexo)
            return $query->where('sexo', $sexo);

    }
    public function scopePromedio($query, $promedio){
        if ($promedio){
            if($promedio == 0){
                return $query->orderBy('promedio','asc');
            }else{
                return $query->orderBy('promedio','desc');
            }
        }

    }

}
