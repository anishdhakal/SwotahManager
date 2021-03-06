<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Session\Session;


class AuthMiddleware
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
        if(empty(\session('user'))){
          return redirect('/');
        }
        return $next($request);
    }
}
