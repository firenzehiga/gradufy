<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        // Mendapatkan user yang sedang login
        $user = Auth::user();

        if ($user->role === 'dosen') {

            $dosen = $user->dosen; // Relasi dosen pada model User

            if (!$dosen) {
                abort(404, 'Data dosen tidak ditemukan.');
            }

            return view('profile.edit', [
                'user'  => $request->user(),
                'dosen' => $dosen,
                'nama'  => $dosen ? $dosen->nama : 'Tidak Ditemukan'
            ]);
        }

        
        // Cek apakah pengguna adalah mahasiswa
        if ($user->mahasiswa_id) {
            $mahasiswa = $user->mahasiswa; // Ambil data mahasiswa melalui relasi

            if (!$mahasiswa) {
                abort(404, 'Data mahasiswa tidak ditemukan.');
            }

            return view('admin.contents.mahasiswa.profile.index', [
                'user'      => $user,
                'mahasiswa' => $mahasiswa,
                'role'      => 'mahasiswa',
            ]);
        }

        abort(403, 'Role pengguna tidak valid.');
    
    }
    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
{
    $user = $request->user();

    if ($user->dosen_id) {
        $dosen = $user->dosen; // Ambil data dosen melalui relasi

        if (!$dosen) {
            return redirect()->route('profile.dosen.edit')->with('error', 'Data dosen tidak ditemukan.');
        }

        if ($dosen) {
            // Validasi input
            $validated = $request->validate([
                'telepon' => ['nullable', 'string', 'max:15'], // Telepon opsional
                'email'   => ['nullable', 'email', 'max:255'], // Email wajib
                'alamat'  => ['nullable', 'string', 'max:255'], // Alamat opsional
            ]);

            // Update data dosen
            $dosen->update($validated);
        }
        return Redirect::route('profile.dosen.edit')->with('status', 'Profil berhasil diperbarui.');
    }

    if ($user->mahasiswa_id) {
        $mahasiswa = $user->mahasiswa;

        if (!$mahasiswa) {
            return redirect()->route('profile.mahasiswa.edit')->withErrors('Data mahasiswa tidak ditemukan.');
        }

        $validated = $request->validate([
            'telepon' => ['nullable', 'string', 'max:15'],
            'email'   => ['nullable', 'email', 'max:255'],
            'alamat'  => ['nullable', 'string', 'max:255'],
        ]);

        $mahasiswa->update($validated);

        return Redirect::route('profile.mahasiswa.edit')->with('status', 'Profil mahasiswa berhasil diperbarui.');
    }

    return Redirect::route('profile.mahasiswa.edit')->withErrors('Role pengguna tidak valid.');
}


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
