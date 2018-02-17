<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            //return redirect('/home');
             $response =$next($request);

             return $response->header('Cache-Control','nocache, no-store, max-age=0, must-revalidate')
  ->header('Pragma','no-cache') //HTTP 1.0
  ->header('Expires','Sat, 01 Jan 1990 00:00:00 GMT'); // // Date in the past

        }

        return $next($request);
    }
}
