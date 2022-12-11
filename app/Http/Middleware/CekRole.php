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

        // $role = strtolower(request()->user()->role);

        if (in_array(['pegawai', 'pemilik'], $allowed_roles)) {
            return $next($request);
        }


        if (auth()->user()->karyawan_id != '') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('home');
        }
    }
}
