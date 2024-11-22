<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $usertype = Auth::user()->usertype;

            // If usertype is NULL or empty, allow access
            if (is_null($usertype) || $usertype === '') {
                return $next($request);
            }

            // Otherwise, check for specific roles
            if ($usertype === 'admin' || $usertype === 'employer') {
                abort(403, 'Unauthorized action.');
            }
        }

        // Default behavior: allow access
        return $next($request);
    }
}
