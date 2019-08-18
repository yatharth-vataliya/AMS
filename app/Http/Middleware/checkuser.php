<?php

namespace App\Http\Middleware;

use Closure;

class checkuser
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
        $username=session('username');
        if(empty($username)){
            return redirect(route('login_form'));
        }

        return $next($request);
    }
}
