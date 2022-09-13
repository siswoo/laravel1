<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Modulos;
use App\Models\Pasantes;
use App\Models\User;
use App\Models\UsersRoles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasantiasController extends Controller
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

    function pasantiaVipCreate(){
        $array = $this->getData();
        $usuarios = $array[0];
        $proceso1 = $array[1];
        $contador1 = $array[2];
        $html1 = $array[3];

        $sede = 1;

        return view('pasantias.create',compact('usuarios','proceso1','contador1','html1','sede'));
    }

    function pasantiaNorteCreate(){
        $array = $this->getData();
        $usuarios = $array[0];
        $proceso1 = $array[1];
        $contador1 = $array[2];
        $html1 = $array[3];

        $sede = 2;

        return view('pasantias.create',compact('usuarios','proceso1','contador1','html1','sede'));
    }

    function pasantiaTunalCreate(){
        $array = $this->getData();
        $usuarios = $array[0];
        $proceso1 = $array[1];
        $contador1 = $array[2];
        $html1 = $array[3];

        $sede = 3;

        return view('pasantias.create',compact('usuarios','proceso1','contador1','html1','sede'));
    }

    function pasantiaVipSubaCreate(){
        $array = $this->getData();
        $usuarios = $array[0];
        $proceso1 = $array[1];
        $contador1 = $array[2];
        $html1 = $array[3];

        $sede = 4;

        return view('pasantias.create',compact('usuarios','proceso1','contador1','html1','sede'));
    }

    function pasantiaSoachaCreate(){
        $array = $this->getData();
        $usuarios = $array[0];
        $proceso1 = $array[1];
        $contador1 = $array[2];
        $html1 = $array[3];

        $sede = 5;

        return view('pasantias.create',compact('usuarios','proceso1','contador1','html1','sede'));
    }

    function pasantiaBucaramangaCreate(){
        $array = $this->getData();
        $usuarios = $array[0];
        $proceso1 = $array[1];
        $contador1 = $array[2];
        $html1 = $array[3];

        $sede = 6;

        return view('pasantias.create',compact('usuarios','proceso1','contador1','html1','sede'));
    }

    function pasantiaCaliCreate(){
        $array = $this->getData();
        $usuarios = $array[0];
        $proceso1 = $array[1];
        $contador1 = $array[2];
        $html1 = $array[3];

        $sede = 7;

        return view('pasantias.create',compact('usuarios','proceso1','contador1','html1','sede'));
    }

    function pasantiaSateliteCreate(){
        $array = $this->getData();
        $usuarios = $array[0];
        $proceso1 = $array[1];
        $contador1 = $array[2];
        $html1 = $array[3];

        $sede = 8;

        return view('pasantias.create',compact('usuarios','proceso1','contador1','html1','sede'));
    }

    function store(Request $request){
        $proceso1 = User::where('documento_numero','=',$request->documento_numero)->get();
        $proceso2 = User::where('email','=',$request->email)->get();
        $contador1 = count($proceso1);
        $contador2 = count($proceso2);
        $usuario = rand(9999,999999);

        if($contador1>=1){
            return response()->json(['estatus' => 'error','msg' => 'El número de Documento ya esta registrado'],200);
        }

        if($contador2>=1){
            return response()->json(['estatus' => 'error','msg' => 'El Correo ya esta registrado'],200);
        }
        
        $usuario = User::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'documento_tipo' => $request->documento_tipo,
            'documento_numero' => $request->documento_numero,
            'usuario' => $usuario,
            'password' => $request->documento_numero,
            'codigo_telefono' => $request->codigo_telefono,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'genero' => $request->genero,
            'barrio' => $request->barrio,
            'enterado' => $request->entero,
            'estatus' => $request->estatus,
        ]);

        $pasante = Pasantes::create([
            'id_users' => $usuario->id,
            'sede' => $request->sede,
            'estatus' => $request->estatus,
        ]);

        return response()->json(['estatus' => 'ok','msg' => 'Se ha creado satisfactoriamente'],200);
    }

}
