<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PayrollMiddleware
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
        if ( auth()->user()->role->slug !== 'payroll-manager') {
            
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
