<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LoggedInTeacher
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
        if(session()->has('user') && session()->get('identity') === 2){
            return $next($request);
        }
        return redirect()->route('login');
    }
}
