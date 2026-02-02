<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if user is logged in AND has role 1 (Admin)
        if (Auth::check() && Auth::user()->role == 1) {
            return $next($request);
        }

        // If not admin, send them home with a message
        return redirect('/')->with('error', 'Access Denied! Only administrators are allowed there.');
    }
}