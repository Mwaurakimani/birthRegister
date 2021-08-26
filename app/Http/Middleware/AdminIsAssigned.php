<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminIsAssigned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ((!isset(Auth::user()->hospital_id) || Auth::user()->hospital_id == null) && (Auth::user()->Title != 'Registrar')) {
            return redirect('/Administrators/' . Auth::user()->id);
        }

        return $next($request);
    }
}
