<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class storeEmpresas extends FormRequest
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
            'ciudad_id' => 'required',
            'nombre' => 'required',
            'descripcion' => 'required|min:3|max:50000',
            'domicilio' => 'required',
            'telefono' => 'required',
            'contacto' => 'required',
            'imagen' => 'image',
        ];
    }
}
