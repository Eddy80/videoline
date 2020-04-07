<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
{

    public function handle($request, Closure $next)
    {
        if ( Auth::check()) // && Auth::user()->status==999 )
        {
            return $next($request);
        }
        else {
            return redirect('/');


        }

        abort(404);

    }
}

