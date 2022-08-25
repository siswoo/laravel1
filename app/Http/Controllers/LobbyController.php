<?php

namespace App\Http\Controllers;

use App\Http\Requests\LobbyRequest;
use App\Models\Modulos;
use App\Models\Roles;
use App\Models\User;
use App\Models\UsersRoles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Passport;
use Laravel\Passport\Token;

class LobbyController extends Controller
{
    public function index(LobbyRequest $request){
        $id = Auth::user()->id;
        $usuarios = User::find($id);
        $html1 = '';
        $proceso1 = UsersRoles::join("roles","users_roles.id_roles","=","roles.id")->where('users_roles.id_users','=',$usuarios->id)->where('roles.estatus','=',1)->get();
        //$proceso1 = UsersRoles::select("roles.nombre as roles_nombre","modulos.nombre as modulos_nombre")->join("roles","users_roles.id_roles","=","roles.id")->join("modulos","modulos.id_roles","=","roles.id")->where('users_roles.id_users','=',$usuarios->id)->where('roles.estatus','=',1)->where('modulos.estatus','=',1)->get();
        //$proceso2 = Modulos::where();
        $contador1 = count($proceso1);
        if($contador1>=1){
            foreach($proceso1 as $item){
                $html1 .= '
                <li>
                    <a href="#!" class="btn-sideBar-SubMenu">
                        <i class="zmdi zmdi-case zmdi-hc-fw"></i> '.$item->nombre.' <i class="zmdi zmdi-caret-down pull-right"></i>
                    </a>
                    <ul class="list-unstyled full-box">
                ';
                $proceso2 = Modulos::where('id_roles','=',$item->id_roles)->where('estatus','=',1)->get();
                $contador2 = count($proceso2);
                if($contador2>=1){
                    foreach($proceso2 as $item2){
                        $html1 .= '
                            <li>
                                <a href="'.route("$item2->route").'"><i class="zmdi zmdi-timer zmdi-hc-fw"></i> '.$item2->nombre.'</a>
                            </li>
                        ';
                    }
                }else{
                    $html1 .= 'No tienes Modulos asignados a este Rol';
                }
                $html1 .= '
                    </ul>
                </li>
                ';
            }
        }
        return view('lobby.index',compact('usuarios','proceso1','contador1','html1'));
    }
}
