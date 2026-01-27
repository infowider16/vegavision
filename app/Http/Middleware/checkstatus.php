<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class checkstatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       
        if(Auth::user()->user_status == '0'){
            return redirect()->route('login')->with('error', 'Your account is tempraroly blocked.');
        }
        if(Auth::user()->status == 'approved'){
            return $next($request);
        }

        return redirect()->route('user.profile')->with('error', 'Your account is not approved yet.');
    }
}
