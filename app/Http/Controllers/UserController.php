<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $usuarios = User::all();
        return $usuarios;
    }
    
    public function listado(){
        $usuarios = User::all();
        return $usuarios;
    }
}
