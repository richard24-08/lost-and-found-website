<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $status = strtolower(Auth::user()->status);
            
            if ($status === 'admin' || $status === 'guru') {
                return $next($request);
            }
        }
        
        return redirect('/home')->with('error', 'Unauthorized access.');
    }
}