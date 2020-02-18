<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        // dd(auth()->user());
        if(auth()->user() == null){
            abort(404);   
        }
        else if(auth()->user()->is_admin == 1){
            return $next($request);
        }
        abort(403);
    }
}
