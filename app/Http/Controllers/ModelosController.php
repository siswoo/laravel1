<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Modelos;
use App\Models\Modulos;
use App\Models\User;
use App\Models\UsersRoles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModelosController extends Controller
{

    protected function getData(){
        $id = Auth::user()->id;
        $usuarios = User::find($id);
        $html1 = '';
        $proceso1 = UsersRoles::join("roles","users_roles.id_roles","=","roles.id")->where('users_roles.id_users','=',$usuarios->id)->where('roles.estatus','=',1)->get();
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
        $array[0] = $usuarios;
        $array[1] = $proceso1;
        $array[2] = $contador1;
        $array[3] = $html1;
        return $array;
    }

    function indexVip (){
        $array = $this->getData();
        $usuarios = $array[0];
        $proceso1 = $array[1];
        $contador1 = $array[2];
        $html1 = $array[3];
        $sede = 1;
        $modelos = Modelos::select('modelos.id as modelos_id','modelos.estatus as modelos_estatus','modelos.sede as modelos_sede','modelos.created_at as modelos_created_at','users.id as users_id','users.nombre as users_nombre','users.apellido as users_apellido','users.documento_tipo as users_documento_tipo','users.documento_numero as users_documento_numero','users.email as users_email','users.telefono as users_telefono')->where('sede','=',$sede)->join('users','modelos.id_users','=','users.id')->orderBy('modelos.id','DESC')->paginate(10);
        return view('modelos.index',compact('usuarios','proceso1','contador1','html1','sede','modelos'));
    }
}
