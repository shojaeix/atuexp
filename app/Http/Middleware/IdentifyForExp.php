<?php

namespace App\Http\Middleware;

use Closure;

class IdentifyForExp
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
        if(!session()->has('exp_id'))
            return redirect(route('exp.intro'));

        return $next($request);
    }
}
