<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RegularAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response

    {
        $isAdmin = (Auth::user()->user_level <= 1) ? true : false;
        if(!$isAdmin){
            return response('You are forbidden from accessing this resource'.' '.Auth::user()->user_role,'404');
        }
        return $next($request);
    }
}
