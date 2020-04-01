<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class MemberMiddleware
{

    public function handle($request, Closure $next)
    {
        if ( Auth::check() && Auth::user()->status==999 )
        {
            return redirect('/admin');
        }
        else  if ( Auth::check() ) //&& Auth::user()->status != 999  )
        {
            return $next($request);
        }
        else {
            return redirect('/home');


        }

        abort(404);

    }
}

