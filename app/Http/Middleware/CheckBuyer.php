<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckBuyer
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
        if(Auth::user()->role_id==2){
            return abort(403);
        }
        return $next($request);
    }
}
