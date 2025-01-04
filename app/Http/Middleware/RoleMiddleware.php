<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role) // Menambahkan parameter $role
    {
        if (Auth::check()) {
            $user = Auth::user();
    
            // Periksa apakah pengguna memiliki peran yang sesuai
            if ($user->role !== $role) {
                // Arahkan ke dashboard sesuai peran
                if ($user->role === 'dosen') {
                    return redirect()->route('dosen.dashboard');
                } elseif ($user->role === 'mahasiswa') {
                    return redirect()->route('mahasiswa.dashboard');
                }
            }
        }

        return $next($request);
    }
}
