<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show(){
        if(Auth::check()){
            return 'estas logeado';
        }else{
            return view('auth.login');
        }
    }

    public function login(LoginRequest $request){
        $credentials = $request->getCredentials();
        if(!Auth::validate($credentials)){
            //return redirect()->to('/')->withErrors('auth.failed'); //No me funciono
            //return redirect()->to('/')->with('error','Credenciales Incorrectas');
            $datos = [
                "estatus"   => "error",
                "msg"   => "Credenciales Incorrectas",
            ];
            return json_encode($datos);
        }
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        return 'ok';
        Auth::login($user);
        return $this->authenticated($request,$user);
    }

    public function authenticated(Request $request, $user){
        return redirect()->route('lobby.index');
    }
}
