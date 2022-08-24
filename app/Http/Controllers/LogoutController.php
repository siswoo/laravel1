<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Passport\Token;

class LogoutController extends Controller
{
    public function logout(){
        //$token = auth()->user()->token();
        //$token->revoke();
        $user = Auth::user();
        Token::where('user_id','=',$user->id)->delete();
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
