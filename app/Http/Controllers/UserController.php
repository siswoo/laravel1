<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest;
use App\Models\Modulos;
use App\Models\Roles;
use App\Models\User;
use App\Models\UsersRoles;
use GuzzleHttp\Psr7\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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

    public function index(Request $request){
        $filtrar_nombre = $request->get('filtrar_nombre');
        $filtrar_apellido = $request->get('filtrar_apellido');
        $filtrar_documento = $request->get('documento');
        
        $array = $this->getData();
        $usuarios = $array[0];
        $proceso1 = $array[1];
        $contador1 = $array[2];
        $html1 = $array[3];

        $usuarios2 = User::where('id','!=',0);
        
        if($filtrar_nombre!=''){
            $usuarios2 = $usuarios2->where('nombre','like','%'.$filtrar_nombre.'%');
        }

        if($filtrar_apellido!=''){
            $usuarios2 = $usuarios2->where('apellido','like','%'.$filtrar_apellido.'%');
        }

        if($filtrar_documento!=''){
            $usuarios2 = $usuarios2->where('documento_numero','like','%'.$filtrar_documento.'%');
        }

        $usuarios2 = $usuarios2->paginate(10);
        $contador2 = count($usuarios2);

        if($contador2>=1){
            foreach($usuarios2 as $item){
                $proceso3 = UsersRoles::where('id_users','=',$item->id)->join('roles','roles.id','=','users_roles.id_roles')->get();
                $contador3 = count($proceso3);
                if($contador3>=1){
                    $html2[$item->id] = '';
                    foreach($proceso3 as $item3){
                        $html2[$item->id] .= $item3->nombre." | ";
                    }
                }
            }
        }

        return view('usuarios.index',compact('usuarios','proceso1','contador1','html1','usuarios2','filtrar_nombre','filtrar_apellido','filtrar_documento','contador2','html2'));
    }
    
    public function listado(){
        $usuarios = User::all();
        return $usuarios;
    }

    public function create(){
        $array = $this->getData();
        $usuarios = $array[0];
        $proceso1 = $array[1];
        $contador1 = $array[2];
        $html1 = $array[3];

        return view('usuarios.create',compact('usuarios','proceso1','contador1','html1'));
    }

    function store(UsersRequest $request){

        $usuario1 = User::where('email','=',$request->email)->get();
        $usuario2 = User::where('usuario','=',$request->usuario)->get();
        $usuario3 = User::where('documento_numero','=',$request->documento_numero)->get();
        $contador1 = count($usuario1);
        $contador2 = count($usuario2);
        $contador3 = count($usuario3);

        if($contador1>=1){
            return response()->json(['estatus' => 'error','msg' => 'Duplicado Correo'],200);
        }else if($contador2>=1){
            return response()->json(['estatus' => 'error','msg' => 'Duplicado Usuario'],200);
        }else if($contador3>=1){
            return response()->json(['estatus' => 'error','msg' => 'Duplicado Numero de Documento'],200);
        }
        
        $usuario = User::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'documento_tipo' => $request->documento_tipo,
            'documento_numero' => $request->documento_numero,
            'usuario' => $request->usuario,
            'password' => $request->password,
            'email' => $request->email,
            'estatus' => $request->estatus,
        ]);

        return response()->json(['estatus' => 'ok','msg' => 'Se ha creado satisfactoriamente'],200);
    }

    public function update(Request $request){
        $rol = User::find($request->id);

        $usuario1 = User::where('email','=',$request->email)->where('id','!=',$request->id)->get();
        $usuario2 = User::where('usuario','=',$request->usuario)->where('id','!=',$request->id)->get();
        $usuario3 = User::where('documento_numero','=',$request->documento_numero)->where('id','!=',$request->id)->get();
        $contador1 = count($usuario1);
        $contador2 = count($usuario2);
        $contador3 = count($usuario3);

        if($contador1>=1){
            return response()->json(['estatus' => 'error','msg' => 'Duplicado Correo'],200);
        }else if($contador2>=1){
            return response()->json(['estatus' => 'error','msg' => 'Duplicado Usuario'],200);
        }else if($contador3>=1){
            return response()->json(['estatus' => 'error','msg' => 'Duplicado Numero de Documento'],200);
        }

        $rol->nombre = $request->nombre;
        $rol->apellido = $request->apellido;
        $rol->documento_tipo = $request->documento_tipo;
        $rol->documento_numero = $request->documento_numero;
        $rol->usuario = $request->usuario;
        $rol->email = $request->email;
        $rol->estatus = $request->estatus;
        $rol->save();
        return response()->json(['estatus' => 'ok','msg' => 'Se ha modificado satisfactoriamente'],200);
    }

    public function show($id){
        $array = $this->getData();
        $usuarios = $array[0];
        $proceso1 = $array[1];
        $contador1 = $array[2];
        $html1 = $array[3];

        $usuario = User::find($id);
        return view('usuarios.show',compact(['usuarios','proceso1','contador1','html1','usuario']));
    }

    public function destroy(Request $request){
        $usuario = User::find($request->id);
        $usuario->delete();
        return response()->json(['estatus' => 'ok','msg' => 'Se ha eliminado correctamente'],200);
    }

    public function createRol(Request $request){
        $array = $this->getData();
        $usuarios = $array[0];
        $proceso1 = $array[1];
        $contador1 = $array[2];
        $html1 = $array[3];

        $usersroles = UsersRoles::select('users_roles.id as users_roles_id','users_roles.id as id_users','roles.id as id_roles','roles.nombre as roles_nombre')->where('id_users','=',$request->id)->join('roles','roles.id','=','id_roles')->get();
        $roles = Roles::all();
        $contador2 = count($usersroles);
        $usuario_id = $request->id;

        return view('usuarios.createRol',compact('usuarios','proceso1','contador1','html1','usersroles','contador2','roles','usuario_id'));
    }
}


