<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Token;

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
            $datos = [
                "estatus"   => "error",
                "msg"   => "Credenciales Incorrectas",
            ];
            return json_encode($datos);
        }else{
            $user = Auth::getProvider()->retrieveByCredentials($credentials);
            Auth::login($user);
            Token::where('user_id','=',$user->id)->delete();
            $token = Auth::User()->createToken('Token')->accessToken;
            //
            $datos = [
                "estatus"   => "ok",
                "token" => $token,
            ];
            return json_encode($datos);
        }
    }

    public function authenticated(Request $request, $user){
        return redirect()->route('lobby.index');
    }
}
