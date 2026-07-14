<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (in_array(Auth::user()->role, [
            'super admin',
            'admin_tu',
            'admin_bms',
            'admin_npd',
            'admin_yandas'
        ])) {

            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}
