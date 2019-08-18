<?php

namespace App\Http\Middleware;

use Closure;

class ifuserexists
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
        if(!empty(session('username'))){
            return redirect(route('index'));
        }
        return $next($request);
    }
}
