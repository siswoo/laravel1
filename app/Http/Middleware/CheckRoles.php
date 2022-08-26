<?php

namespace App\Http\Middleware;

use App\Models\Modulos;
use App\Models\UsersRoles;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $usuario = Auth::user();
        $pase1 = 0;
        $url = url()->current();
        $proceso1 = UsersRoles::where('id_users','=',$usuario->id)->get();
        foreach($proceso1 as $item1){
            $proceso2 = Modulos::where('id_roles','=',$item1->id_roles)->get();
            $contador2 = count($proceso2);
            if($contador2>=1 and $pase1==0){
                foreach($proceso2 as $item2){
                    if(route($item2->route) == $url){
                        $pase1 = 1;
                    }
                }
            }
        }
        if($pase1==1){
            return $next($request);
        }else{
            dd("no permitido");
        }
    }
}
