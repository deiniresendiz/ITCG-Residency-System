<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class storeEgresados extends FormRequest
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
     */
    public function rules()
    {
        return [
            'carrera_id'  => 'required',
            'ciudad_id'  => 'required',
            'no_control'  => 'required',
            'nombre'  => 'required',
            'sexo'  => 'required',
            'estado_civil'  => 'required',
            'nacimiento'  => 'required',
        ];
    }
}
