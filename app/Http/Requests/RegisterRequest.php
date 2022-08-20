<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return false; //403 THIS ACTION IS UNAUTHORIZED. -> tiene que estar logeado
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nombre' => 'required|min:4',
            'apellido' => 'required|min:4',
            'documento_tipo' => 'required',
            'documento_numero' => 'required|min:4',
            'email' => 'required|email|min:4|unique:users,email',
            'usuario' => 'required|min:4|unique:users,usuario',
            'password' => 'required|min:6',
            //'password_confirmation' => 'required|same:password',
            'rol1' => 'required',
        ];
    }
}
