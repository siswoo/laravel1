<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nombre' => 'required|min:4|max:20',
            'apellido' => 'required|min:4|max:20',
            'documento_tipo' => 'required',
            'documento_numero' => 'required|min:6|max:20',
            'usuario' => 'required|min:6|max:20',
            'password' => 'required|min:6|max:20',
            'email' => 'required|min:6|max:30',
            'estatus' => 'required',
        ];
    }
}
