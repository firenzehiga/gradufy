<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Mahasiswa;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'nim' => 'required|string|max:50|unique:mahasiswa',
        'jurusan' => 'required|string|max:100',
        'alamat' => 'required|string|max:255',
        'telepon' => 'required|string|max:20',
        'email' => 'required|email',
        'password' => 'required|string|min:6|confirmed',
    ]);

    // Simpan ke tabel mahasiswa
    $mahasiswa = Mahasiswa::create([
        'nama' => $request->nama,
        'nim' => $request->nim,
        'jurusan' => $request->jurusan,
        'alamat' => $request->alamat,
        'telepon' => $request->telepon,
        'email' => $request->email,
        'dosen_id' => 1, 
    ]);

    // Simpan ke tabel users
    $user = User::create([
        'mahasiswa_id' => $mahasiswa->id,
        'email' => $mahasiswa->email,
        'password' => Hash::make($request->password),
        'role' => 'mahasiswa',
        'nim' => $request->nim,
        // 'dosen_id' => null,
        // 'nip' => null,
    ]);

    // Login otomatis (opsional)
    // Auth::login($user);

    return redirect('/')->with('success', 'Registrasi berhasil!');
}
}