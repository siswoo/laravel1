<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UsersRoles;
use Illuminate\Http\Request;

class UsersRolesController extends Controller
{
    public function destroy(Request $request){
        $proceso1 = UsersRoles::find($request->id);
        $proceso1->delete();
        return response()->json(['estatus' => 'ok','msg' => "Se ha eliminado exitosamente"],200);
    }

    function store(Request $request){
        $proceso1 = UsersRoles::create([
            'id_users' => $request->id_users,
            'id_roles' => $request->id_roles,
        ]);
        return response()->json(['estatus' => 'ok','msg' => "Se ha creado exitosamente"],200);
    }
}
