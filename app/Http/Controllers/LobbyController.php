<?php

namespace App\Http\Controllers;

use App\Http\Requests\LobbyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Passport;
use Laravel\Passport\Token;

class LobbyController extends Controller
{
    public function index(LobbyRequest $request){
        
        $usuario = auth()->user();
        /*$token = auth()->user()->token();
        return auth()->guard('api')->user();
        $datos = [
            "usuario"   => $usuario,
            "token"   => $token,
        ];
        return json_encode($datos);
        return auth()->user();
        */
        return Token::where('user_id','=',$usuario->id)->get();
        return view('lobby.index');
    }
}
