<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class storeBolsaTrabajo extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     * 'estado'=>[
    'required',
    Rule::in(['Activo','Terminado'])
    ],
    'nombre' => 'required',
    'descripcion' => 'required|min:3|max:5000',
    'instructor' => 'required',
    'lugar' => 'required',
    'fecha_inicio' => 'required|date',
    'fecha_final' => 'required|date',
    'precio' => 'required',
    'imagen' => 'image',
     */
    public function rules()
    {
        return [
            'empresa_id'  => 'required',
            'area_id'  => 'required',
            'ciudad_id'  => 'required',
            'puesto'  => 'required',
            'fecha'  => 'required',
            'descripcion'  => 'required|min:3|max:5000',
            'contracto'  => 'required',
            'telefono'  => 'required',
            'domicilio'  => 'required',
            'estado'  => 'required',
            'imagen'  => 'image',
            'requisitos' => 'required|min:3|max:5000',
        ];
    }
}
