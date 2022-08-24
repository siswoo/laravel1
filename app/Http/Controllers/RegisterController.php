<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function show(){
        return view('auth.register');
    }

    public function store(RegisterRequest $request){
        //$user = User::create($request->validated());
        
        $user = User::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'documento_tipo' => $request->documento_tipo,
            'documento_numero' => $request->documento_numero,
            'usuario' => $request->usuario,
            'password' => $request->password,
            'rol1' => $request->rol1,
            'email' => $request->email,
        ]);

        $token = $user->createToken('Token')->accessToken;
        return response()->json(['Token' => $token],200);
        //return redirect('/login')->with('success','Cuenta creada exitosamente');
    }
}
