<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
        }
    /*public function handle($request, Closure $next) {
        if($auth = $request->header('X-Authorization')) {
            $request->headers->set('Authorization', $auth);
        }*/

        return $next($request);
    }
}
