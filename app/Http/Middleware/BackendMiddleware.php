<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class BackendMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next, $guard = "employee")
    {
        if (auth()->guard($guard)->check()) {
            return $next($request);
        }

        return redirect('/admin/login');
    }
}
