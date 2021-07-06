<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class isAdmin
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
        $role_id=0;
        if(isset(Auth::user()->role_id)){
            $role_id=Auth::user()->role_id;
        }
        if (Auth::user() &&  $role_id == 1) {
            return $next($request);
       }
       return redirect('/')->with('error','You have Not Admin Access');
    }
    
}
