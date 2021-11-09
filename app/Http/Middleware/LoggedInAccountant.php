<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LoggedInAccountant
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
        if(session()->has('user') && session()->get('identity') === 3){
            return $next($request);
        }
        return redirect()->route('login');
    }
}
