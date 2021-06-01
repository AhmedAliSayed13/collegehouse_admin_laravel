<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class isOwner
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
        $role_id=Auth::user()->role_id;
        if (Auth::user() &&  $role_id == 2) {
            return $next($request);
       }
       return redirect('/')->with('error','You have Not Owner Access');
    }
}
