<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

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
        //$token = $request->header('Authorization');
        //dd($token = $request->user()->token());
        if (auth()->user()->usuario == 'jdolarj') {
            return $next($request);
        }else{
            return response()->json('Your account is inactive');
        }
        //return $next($request);
    }
}
