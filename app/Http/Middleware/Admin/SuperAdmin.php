<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $isSuperAdmin = (Auth::user()->user_role == 'admin' && Auth::user()->user_level == 0) ? true : false;
        if(!$isSuperAdmin){
            return response('You are forbidden from accessing this resource','404');
        }
        
        return $next($request);
    }
}
