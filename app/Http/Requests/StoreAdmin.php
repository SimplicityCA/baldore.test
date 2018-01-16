<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdmin extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->id,
            'password' => 'required_if:update,0',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre del administrador es requerido',
            'email.required' => 'El email del administrador es requerido',
            'email.email' => 'El email ingresado no es válido',
            'email.unique' => 'El email ingresado ya esta siendo usado por otro administrador',
            'password.required_if' => 'La contraseña es requerida si se va a crear el usuario'
        ];
    }
}
