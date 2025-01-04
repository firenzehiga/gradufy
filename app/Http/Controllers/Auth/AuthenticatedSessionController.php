<?php

namespace App\Http\Controllers\Auth;

use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
{
    try {
        $request->authenticate();

        $request->session()->regenerate();

        $userRole = $request->user()->role;

        if ($userRole === 'dosen') {
            return redirect()->route('dosen.dashboard');
        }

        if ($userRole === 'mahasiswa') {
            return redirect()->route('mahasiswa.dashboard');
        }

        return redirect()->route('login');
    } catch (ValidationException $e) {
        return redirect()->back()->withErrors([
            'email' => 'Email atau password salah!',
        ]);
    }
}

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
