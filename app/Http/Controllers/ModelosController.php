<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Modelos;
use App\Models\ModelosBancarios;
use App\Models\ModelosDocumentos;
use App\Models\ModelosPersonal;
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

    function show($sede,$id){
        $array = $this->getData();
        $usuarios = $array[0];
        $proceso1 = $array[1];
        $contador1 = $array[2];
        $html1 = $array[3];
        $modelo = Modelos::select('modelos.id as modelos_id','modelos.estatus as modelos_estatus','modelos.sede as modelos_sede','modelos.created_at as modelos_created_at','users.id as users_id','users.nombre as users_nombre','users.apellido as users_apellido','users.documento_tipo as users_documento_tipo','users.documento_numero as users_documento_numero','users.email as users_email','users.telefono as users_telefono')->join('users','users.id','=','modelos.id_users')->where('modelos.id_users','=',$id)->where('modelos.sede','=',$sede)->orderBy('modelos.id','DESC')->first();
        if(!isset($modelo->pasantes_id)){
            $id_final = 0;
        }else{
            $id_final = $modelo->pasantes_id;
        }
        return view('modelos.show',compact('usuarios','proceso1','contador1','html1','modelo','id_final'));
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

    function personal(){
        $array = $this->getData();
        $usuarios = $array[0];
        $proceso1 = $array[1];
        $contador1 = $array[2];
        $html1 = $array[3];

        $id = Auth::user()->id;
        $modelo = Modelos::select('modelos.id as modelos_id','modelos.estatus as modelos_estatus','modelos.sede as modelos_sede','modelos.created_at as modelos_created_at','users.id as users_id','users.nombre as users_nombre','users.apellido as users_apellido','users.documento_tipo as users_documento_tipo','users.documento_numero as users_documento_numero','users.email as users_email','users.telefono as users_telefono')->where('users.id','=',$id)->join('users','modelos.id_users','=','users.id')->first();
        if(!isset($modelo->modelos_id)){
            dd("Sin permisos detectados");
        }else{
            $id_final = $modelo->modelos_id;
        }
        return view('modelos.personal',compact('usuarios','proceso1','contador1','html1','modelo','id_final'));
    }

    function bancarios(){
        $array = $this->getData();
        $usuarios = $array[0];
        $proceso1 = $array[1];
        $contador1 = $array[2];
        $html1 = $array[3];

        $id = Auth::user()->id;
        $modelo = Modelos::where('id_users','=',$id)->first();
        if(!isset($modelo->id)){
            dd("Error, no tiene permisos");
        }

        $modelobancarios = ModelosBancarios::where('id_modelos','=',$modelo->id)->first();
        $id_modelo = $modelo->id;
        return view('modelos.bancarios',compact('usuarios','proceso1','contador1','html1','modelobancarios','id_modelo'));
    }

    function bancarios_update(){
        $id = Auth::user()->id;
        $modelo = Modelos::where('id_users','=',$id)->first();
        if(!isset($modelo->id)){
            dd("Error, no tiene permisos");
        }

        $modelobancarios = ModelosBancarios::where('id_modelos','=',$modelo->id)->first();
        $id_modelo = $modelo->id;
        return view('modelos.bancarios',compact('usuarios','proceso1','contador1','html1','modelobancarios','id_modelo'));
    }

    function documentos_index($sede,$id){
        $array = $this->getData();
        $usuarios = $array[0];
        $proceso1 = $array[1];
        $contador1 = $array[2];
        $html1 = $array[3];
        $modelo = Modelos::select('modelos.id as modelos_id','modelos.estatus as modelos_estatus','modelos.sede as modelos_sede','modelos.created_at as modelos_created_at','users.id as users_id','users.nombre as users_nombre','users.apellido as users_apellido','users.documento_tipo as users_documento_tipo','users.documento_numero as users_documento_numero','users.email as users_email','users.telefono as users_telefono')->join('users','users.id','=','modelos.id_users')->where('modelos.id_users','=',$id)->where('modelos.sede','=',$sede)->orderBy('modelos.id','DESC')->first();
        if(!isset($modelo->modelos_id)){
            dd("Sin permisos detectados");
        }else{
            $id_final = $modelo->modelos_id;
        }
        $ModelosDocumentos = ModelosDocumentos::select('modelos_documentos.id_modelos as md_id_modelos','modelos_documentos.id_documentos as md_id_documentos','modelos_documentos.documento_nombre as md_documento_nombre','modelos_documentos.documento_formato as md_documento_formato','modelos_documentos.ruta as md_ruta','documentos.nombre as doc_nombre')->where("modelos_documentos.id_modelos",'=',$modelo->modelos_id)->join('documentos','documentos.id','=','modelos_documentos.id_documentos')->get();
        dd($ModelosDocumentos);
        $contador2 = count($ModelosDocumentos);
        $html2 = '';
        if($contador2>=1){
            foreach($ModelosDocumentos as $documento){
                //
            }
        }
        return view('modelos.documentos_index',compact('usuarios','proceso1','contador1','html1','modelo','id_final','ModelosDocumentos','contador2'));
    }
}
