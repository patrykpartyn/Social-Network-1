<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Request;
use Closure;

class CheckUserPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //var_dump(Request::segment(2));

    
        
        if(Auth::check() && Request::segment(2)!=Auth::id()){
            abort(403,'Brak dostepu');
        }
        return $next($request);
    }
}
