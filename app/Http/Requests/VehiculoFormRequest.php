<?php

namespace pruebatecnicaoet\Http\Requests;

use pruebatecnicaoet\Http\Requests\Request;

class VehiculoFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'placa' => 'required',
            'color' => 'required',
            'marca' => 'required',
            'tipovehiculo' => 'required',
            'conductor' => 'required',
            'propietario' => 'required',
        ];
    }
}
