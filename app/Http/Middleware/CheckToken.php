<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Models\UsersRoles;
use Closure;
use Illuminate\Http\Request;
use Laravel\Passport\Token;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckToken
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
        //session(['key' => 'value']);
        //$token = $request->header('Authorization');
        //dd($token = $request->user());
        if(!Auth::check()){
            return redirect()->route('home.index');
        }

        $usuario = auth()->user();
        $fecha_actual = date('Y-m-d H:i:s');
        $pase1 = 0;
        $pase2 = 0;

        $data = $request->session()->all();
        
        if($data['Tokendb'] != $usuario->Token){
            return redirect()->route('login.doublelogin');
        }

        $proceso1 = Token::where('user_id','=',$usuario->id)->where('expires_at','>',$fecha_actual)->where('revoked','=',0)->get();
        $contador1 = count($proceso1);

        $proceso2 = UsersRoles::join("roles","users_roles.id_roles","=","roles.id")->join("users","users.id","=","users_roles.id_users")->where('users.id','=',$usuario->id)->get();
        $contador2 = count($proceso2);
        
        if($contador2>=1){
            $pase2 = 1;
        }

        if($contador1>=1){
            $pase1 = 1;
        }
        
        if($pase1==1 and $pase2==1){
            return $next($request);
        }else{
            //return response()->json('Your account is inactive');
            Session::flush();
            Auth::logout();
            return redirect()->route('home.index');
        }
    }
}
