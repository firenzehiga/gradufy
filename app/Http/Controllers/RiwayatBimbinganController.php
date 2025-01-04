<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

Carbon::setLocale('id'); // Set Waktu lokal ke Indonesia


class RiwayatBimbinganController extends Controller
{
    public function index()
{
    $user = Auth::user();

    // Jika user adalah dosen
    if ($user->dosen_id) {
        $dosen = $user->dosen; // Ambil data dosen

        $riwayatbmb = $user->dosen->jadwalbimbingan()
            ->where('status', 'Bimbingan Selesai')
            ->with(['mahasiswa']) // Relasi mahasiswa untuk menampilkan data mahasiswa
            ->get();

            return view('admin.contents.dosen.riwayatBimbingan.index', compact('riwayatbmb', 'dosen'));    
        }

    // Jika user adalah mahasiswa
    if ($user->mahasiswa_id) {
        $mahasiswa  = $user->mahasiswa; // Ambil data mahasiswa

        $riwayatbmb = $user->mahasiswa->jadwalbimbingan()
            ->where('status', 'Bimbingan Selesai')
            ->where('tenggat_waktu', '!=', null)
            ->with(['dosen']) // Relasi dosen untuk menampilkan data dosen
            ->get();

        return view('admin.contents.mahasiswa.riwayatBimbingan.index', compact('riwayatbmb', 'mahasiswa'));
    }

    abort(403, 'Role tidak dikenali.');
}


}