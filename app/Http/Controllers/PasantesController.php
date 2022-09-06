<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Modelos;
use App\Models\Modulos;
use App\Models\Pasantes;
use App\Models\Roles;
use App\Models\Sedes;
use App\Models\User;
use App\Models\UsersRoles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasantesController extends Controller
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

    function info(){
        $array = $this->getData();
        $usuarios = $array[0];
        $proceso1 = $array[1];
        $contador1 = $array[2];
        $html1 = $array[3];

        $id = Auth::user()->id;
        $pasante = Pasantes::where('id_users','=',$id)->first();
        if($pasante==''){
            $estatus = '';
            $sede = '';
        }else{
            $sede = Sedes::where('id','=',$pasante->sede)->first();
            if($pasante->estatus==1){
                $estatus = 'En Proceso';
            }else if($pasante->estatus==2){
                $estatus = 'Aceptado';
            }else if($pasante->estatus==3){
                $estatus = 'Rechazado';
            }
        }
        return view('pasante.info',compact('usuarios','proceso1','contador1','html1','pasante','sede','estatus'));
    }

    function indexVip (){
        $array = $this->getData();
        $usuarios = $array[0];
        $proceso1 = $array[1];
        $contador1 = $array[2];
        $html1 = $array[3];
        $sede = 1;
        $pasantes = Pasantes::select('pasantes.id as pasantes_id','pasantes.estatus as pasantes_estatus','pasantes.sede as pasantes_sede','pasantes.created_at as pasantes_created_at','users.id as users_id','users.nombre as users_nombre','users.apellido as users_apellido','users.documento_tipo as users_documento_tipo','users.documento_numero as users_documento_numero','users.email as users_email','users.telefono as users_telefono')->where('sede','=',$sede)->join('users','pasantes.id_users','=','users.id')->orderBy('pasantes.id','DESC')->paginate(10);
        return view('pasante.index',compact('usuarios','proceso1','contador1','html1','sede','pasantes'));
    }

    function show($sede,$id){
        $array = $this->getData();
        $usuarios = $array[0];
        $proceso1 = $array[1];
        $contador1 = $array[2];
        $html1 = $array[3];
        //$pasante = Pasantes::where('id','=',$id)->where('sede','=',$sede)->get();
        $pasante = Pasantes::select('pasantes.id as pasantes_id','pasantes.estatus as pasantes_estatus','pasantes.sede as pasantes_sede','pasantes.created_at as pasantes_created_at','users.id as users_id','users.nombre as users_nombre','users.apellido as users_apellido','users.documento_tipo as users_documento_tipo','users.documento_numero as users_documento_numero','users.email as users_email','users.telefono as users_telefono')->join('users','users.id','=','pasantes.id_users')->where('pasantes.id_users','=',$id)->where('pasantes.sede','=',$sede)->orderBy('pasantes.id','DESC')->first();
        if(!isset($pasante->pasantes_id)){
            $id_final = 0;
        }else{
            $id_final = $pasante->pasantes_id;
        }
        return view('pasante.show',compact('usuarios','proceso1','contador1','html1','pasante','id_final'));
    }

    function update(Request $request){
        $validar1 = User::where('id','!=',$request->id)->where('documento_numero','=',$request->documento_numero)->get();
        $validar2 = User::where('id','!=',$request->id)->where('email','=',$request->email)->get();
        $contador1 = count($validar1);
        $contador2 = count($validar2);
        if($contador1>=1){
            return response()->json(['estatus' => 'error','msg' => 'Ya hay otro usuario con dicho numero de documento'],200);
        }
        if($contador2>=1){
            return response()->json(['estatus' => 'error','msg' => 'Ya hay otro usuario con dicho Correo'],200);
        }
        $usuario = User::find($request->id);
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->documento_tipo = $request->documento_tipo;
        $usuario->documento_numero = $request->documento_numero;
        $usuario->telefono = $request->telefono;
        $usuario->email = $request->email;
        $usuario->password = $request->documento_numero;
        $usuario->save();
        return response()->json(['estatus' => 'ok','msg' => 'Se ha modificado satisfactoriamente'],200);
    }

    function aceptar1(Request $request){
        $pasante = Pasantes::where('id','=',$request->id)->where('estatus','=',1)->get();
        $contador1 = count($pasante);
        if($contador1==0){
            return response()->json(['estatus' => 'error','msg' => 'Error, Este pasante ya tiene un estatus asignado'],200);
        }else{
            foreach($pasante as $item){
                $modelo = Modelos::create([
                    'id_users' => $item->id_users,
                    'sede' => $item->sede,
                    'estatus' => 1,
                ]);
                $item->estatus = 2;
                $item->save();
            }
            return response()->json(['estatus' => 'ok','msg' => 'Se ha cambiado satisfactoriamente'],200);
        }
    }

    function rechazar1(Request $request){
        $pasante = Pasantes::where('id','=',$request->id)->where('estatus','=',1)->get();
        $contador1 = count($pasante);
        if($contador1==0){
            return response()->json(['estatus' => 'error','msg' => 'Error, Este pasante ya tiene un estatus asignado'],200);
        }else{
            foreach($pasante as $item){
                $item->estatus = 3;
                $item->save();
            }
            return response()->json(['estatus' => 'ok','msg' => 'Se ha cambiado satisfactoriamente'],200);
        }
    }

}
