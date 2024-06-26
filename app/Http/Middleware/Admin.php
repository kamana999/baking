<?php

namespace App\Http\Middleware;

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
        if(Auth::check() && $request->user()->isAdmin == 1){
            return $next($request);
        }
        else{
            return redirect()->route('login')->with('error',"Only admin can access!");
        }
    }
}
