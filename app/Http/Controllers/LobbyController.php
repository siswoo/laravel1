<?php

namespace App\Http\Controllers;

use App\Http\Requests\LobbyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LobbyController extends Controller
{
    public function index(LobbyRequest $request){
        return view('lobby.index');
    }
}
