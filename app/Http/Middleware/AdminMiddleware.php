<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next) {
        // Check if the user is authenticated
        if (!auth()->check()) {
            return redirect('/login');
        }
        
        // Check if the user has the role slug 'super_admin'
        if ( auth()->user()->role->slug !== 'administrator') {
            // if ( auth()->user()->role->slug !== 'super-admin') {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
