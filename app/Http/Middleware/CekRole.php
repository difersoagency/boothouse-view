<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$allowed_roles)
    {
        if (request()->user()->customer_id != NULL) {
            $role = 'customer';
        } else {
            $role = 'admin';
        }
        if (in_array($role, $allowed_roles)) {
            return $next($request);
        }


        if (request()->user()->customer_id != NULL) {
            return redirect()->route('home');
        } else {
            return redirect()->route('admin.dashboard');
        }
    }
}
