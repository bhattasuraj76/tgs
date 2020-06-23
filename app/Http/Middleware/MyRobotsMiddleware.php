<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Spatie\RobotsMiddleware\RobotsMiddleware;

class MyRobotsMiddleware extends RobotsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected function shouldIndex(Request $request)
    {
        if ($request->segment(1) == 'admin') {
            return false;
        }

        if ($request->is('/reviews?' . '*')) {
            return false;
        }

        if ($request->segment(1) == 'booking') {
            return false;
        }

        return true;
    }
}


