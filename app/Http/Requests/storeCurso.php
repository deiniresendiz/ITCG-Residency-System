<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class storeCurso extends FormRequest
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
     *
     */
    public function rules()
    {
        return [
            'estado'=>[
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
        ];
    }
}
