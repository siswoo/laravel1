<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    public function logout(){
        $token = auth()->user()->token();
        $token->revoke();
        Session::flush();
        Auth::logout();
        return redirect()->route('home.index');
    }

    public function logout2(){
        Session::flush();
        Auth::logout();
        return redirect()->route('home.index');
    }
}
