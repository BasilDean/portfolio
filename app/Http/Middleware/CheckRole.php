<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Check if the user is authenticated
        if (!auth()->check()) {
            abort(403, 'Unauthorized action.');
        }

        // Check if the authenticated user has the required role
        if (!$request->user()->hasRole($role)) {
            // Optionally, you can show a 403 Forbidden error or redirect
            abort(403);
        }


        return $next($request);
    }
}
