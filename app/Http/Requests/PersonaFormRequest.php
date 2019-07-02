<?php

namespace pruebatecnicaoet\Http\Requests;

use pruebatecnicaoet\Http\Requests\Request;

class PersonaFormRequest extends Request
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
            'primernombre' => 'required|max:99',
            'segundonombre' => 'required|max:99',
            'apellidos' => 'required|max:99',
            'direccion' => 'required',
            'tipodocumento' => 'required',
            'numerodocumento' => 'required',
            'telefono' => 'required',
            'ciudad' => 'required',
            'tipopersona' => 'required',
        ];
    }
}
