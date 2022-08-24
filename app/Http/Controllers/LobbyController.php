<?php

namespace App\Http\Controllers;

use App\Http\Requests\LobbyRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Passport;
use Laravel\Passport\Token;

class LobbyController extends Controller
{
    public function index(LobbyRequest $request){
        $id = Auth::user()->id;
        $usuarios = User::find($id);
        return view('lobby.index',compact('usuarios'));
    }
}
