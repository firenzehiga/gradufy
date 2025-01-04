<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DosenMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Memeriksa apakah pengguna yang login adalah dosen
        if (Auth::check() && Auth::user()->role !== 'dosen') {
            // Jika bukan dosen, alihkan ke halaman yang sesuai
            return redirect()->route('mahasiswa.dashboard'); // Misalnya, arahkan ke halaman beranda
        }

        return $next($request);
    }
}
