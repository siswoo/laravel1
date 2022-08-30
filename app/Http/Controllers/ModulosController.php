<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModulosRequest;
use App\Models\Modulos;
use App\Models\Roles;
use App\Models\User;
use App\Models\UsersRoles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModulosController extends Controller
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

    function index(){
        $array = $this->getData();
        $usuarios = $array[0];
        $proceso1 = $array[1];
        $contador1 = $array[2];
        $html1 = $array[3];

        $modulos = Modulos::select('modulos.nombre as nombre','roles.nombre as nombre2','modulos.id as id','modulos.estatus as estatus','modulos.created_at as created_at','modulos.route as route')->join('roles','roles.id','=','modulos.id_roles')->paginate(10);

        return view('modulos.index',compact('usuarios','proceso1','contador1','html1','modulos'));
    }

    function create(){
        $array = $this->getData();
        $usuarios = $array[0];
        $proceso1 = $array[1];
        $contador1 = $array[2];
        $html1 = $array[3];

        $html2 = '';
        $roles = Roles::all();
        foreach($roles as $rol){
            $html2 .= '<option value="'.$rol->id.'">'.$rol->nombre.'</option>';
        }

        return view('modulos.create',compact('usuarios','proceso1','contador1','html1','html2'));
    }

    function store(ModulosRequest $request){
        $modulo = Modulos::create([
            'nombre' => $request->nombre,
            'id_roles' => $request->id_roles,
            'route' => $request->route,
            'estatus' => $request->estatus,
        ]);

        return response()->json(['estatus' => 'ok','msg' => 'Se ha creado satisfactoriamente'],200);
    }

    function show($id){
        $array = $this->getData();
        $usuarios = $array[0];
        $proceso1 = $array[1];
        $contador1 = $array[2];
        $html1 = $array[3];
        $modulos = Modulos::find($id);
        //$modulos = Modulos::select('modulos.nombre as nombre','roles.nombre as nombre2','modulos.id as id','modulos.estatus as estatus','modulos.route as route')->join('roles','roles.id','=','modulos.id_roles')->where('modulos.id','=',$id)->get();
        //$contador2 = count($modulos);
        $roles = Roles::all();
        return view('modulos.show',compact('usuarios','proceso1','contador1','html1','modulos','roles'));
    }

    function update(Request $request){
        $rol = Modulos::find($request->id);
        $rol->nombre = $request->nombre;
        $rol->id_roles = $request->id_roles;
        $rol->route = $request->route;
        $rol->estatus = $request->estatus;
        $rol->save();
        return response()->json(['estatus' => 'ok','msg' => 'Se ha modificado satisfactoriamente'],200);
    }

    public function destroy(Request $request){
        $modulos = Modulos::find($request->id);
        $modulos->delete();
        return response()->json(['estatus' => 'ok','msg' => 'Se ha eliminado correctamente'],200);
    }
}
