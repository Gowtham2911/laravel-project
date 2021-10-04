<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Session;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
       
        if(Session::get('email') == null){
            return redirect('/login');
        }
        return $next($request);
    }
}
