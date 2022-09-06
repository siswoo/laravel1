<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Modulos;
use App\Models\Sedes;
use App\Models\User;
use App\Models\UsersRoles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SedesController extends Controller
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

        $sedes = Sedes::paginate(10);

        return view('sedes.index',compact('usuarios','proceso1','contador1','html1','sedes'));
    }
    
    function create(){
        $array = $this->getData();
        $usuarios = $array[0];
        $proceso1 = $array[1];
        $contador1 = $array[2];
        $html1 = $array[3];

        return view('sedes.create',compact('usuarios','proceso1','contador1','html1'));
    }

    function store(Request $request){
        
        $proceso1 = Sedes::where('nombre','=',$request->nombre)->get();
        $contador1 = count($proceso1);

        if($contador1>=1){
            return response()->json(['estatus' => 'error','msg' => 'El nombre ya esta registrado'],200);
        }
        
        $usuario = Sedes::create([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'ciudad' => $request->ciudad,
            'descripcion' => $request->descripcion,
            'responsable' => $request->responsable,
            'cedula' => $request->cedula,
            'rut' => $request->rut,
        ]);

        return response()->json(['estatus' => 'ok','msg' => 'Se ha creado satisfactoriamente'],200);
    }

    function show($id){
        $array = $this->getData();
        $usuarios = $array[0];
        $proceso1 = $array[1];
        $contador1 = $array[2];
        $html1 = $array[3];

        $sede = Sedes::find($id);

        if(!$sede){
            return redirect()->route('sedes.index');
        }

        return view('sedes.show',compact('usuarios','proceso1','contador1','html1','sede'));
    }

    function update(Request $request){
        $sede = Sedes::find($request->id);
        $sede->nombre = $request->nombre;
        $sede->direccion = $request->direccion;
        $sede->ciudad = $request->ciudad;
        $sede->descripcion = $request->descripcion;
        $sede->responsable = $request->responsable;
        $sede->cedula = $request->cedula;
        $sede->rut = $request->rut;
        $sede->save();

        return response()->json(['estatus' => 'ok','msg' => 'Se ha modificado exitosamente'],200);
    }

    public function destroy(Request $request){
        $usuario = Sedes::find($request->id);
        $usuario->delete();
        return response()->json(['estatus' => 'ok','msg' => 'Se ha eliminado correctamente'],200);
    }
}
