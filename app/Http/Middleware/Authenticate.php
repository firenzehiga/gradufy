<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        // Mengecek apakah pengguna sudah login
        if (Auth::guard($guard)->check()) {
            return $next($request);
        }

        // Jika belum login, arahkan ke halaman login
        return redirect()->route('login');
    }
}
