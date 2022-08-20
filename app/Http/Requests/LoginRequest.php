<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class LoginRequest extends FormRequest
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
            'usuario' => 'required',
            'password' => 'required'
        ];
    }

    public function getCredentials(){
        $usuario = $this->get('usuario');
        if($this->isEmail($usuario)){
            return[
                'email' => $usuario,
                'password' => $this->get('password'),
            ];
        }
        return $this->only('usuario','password');
    }

    public function isEmail($value){
        $factory = $this->container->make(ValidationFactory::class);
        return !$factory->make(['usuario'=>$value],['usuario'=>'email'])->fails();
    }
}
