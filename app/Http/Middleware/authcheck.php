<?php

namespace App\Http\Middleware;

use Closure;

class authcheck
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
       
        $authority=session('authority');
       if(empty($authority)){
            abort(403, 'You Have Not Enough Rights to Do This Task Sorry :)');
            // return redirect(route('access'));
        }
        return $next($request);
    }
}
