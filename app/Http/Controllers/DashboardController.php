<?php

namespace App\Http\Controllers;

use App\Models\JadwalBimbingan;
use Illuminate\Http\Response;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

Carbon::setLocale('id'); // Set Waktu lokal ke Indonesia


class DashboardController extends Controller
{

    public function index()
{
    // Mendapatkan jumlah data yang terkait dengan dosen yang sedang login
    $mahasiswaCount = Mahasiswa::where('dosen_id', Auth::user()->dosen_id)->count();
    $pengajuanCount = JadwalBimbingan::where('status', 'Menunggu Disetujui')
                                        ->where('dosen_id', Auth::user()->dosen_id)->count();

    $riwayatCount   = JadwalBimbingan::where('status', 'Bimbingan Selesai')
                                        ->where('dosen_id', Auth::user()->dosen_id)
                                        ->where('tenggat_waktu', '!=', null)
                                        ->count();

    
    $user = Auth::user(); // Ambil pengguna yang login

    // Jika peran dosen
    if ($user && $user->role === 'dosen') {

        // Ambil ID dosen dari user yang sedang login
        $dosenId = $user->dosen->id;

        $jadwal = JadwalBimbingan::where('status', 'Disetujui')
            ->where('dosen_id', $dosenId)
            ->get();

        $events = $jadwal->map(function ($item) {
            return [
                'id' => $item->id,
                'title' => $item->mahasiswa->nama, // Gunakan deskripsi sebagai judul
                'start' => $item->tanggal->timezone('Asia/Jakarta')->toIso8601String(),
                'allDay' => false,
                'deskripsiBimbingan' => $item->deskripsiBimbingan,
                'mahasiswa' => $item->mahasiswa->nama,
                'nim' => $item->mahasiswa->nim
            ];
        });



        $dosen = $user->dosen; // Ambil data dosen yang terkait dengan user
        return view('admin.contents.dosen.dashboard', compact('mahasiswaCount', 'pengajuanCount', 'riwayatCount', 'events'), [
            'dosen' => $dosen,
            'nama'  => $dosen ? $dosen->nama : 'Tidak Ditemukan'
        ]);
    }

    // Jika peran mahasiswa
    elseif ($user && $user->role === 'mahasiswa') {
        $mahasiswa       = $user->mahasiswa; // Ambil data mahasiswa yang terkait dengan user
        $dosenPembimbing = $mahasiswa ? $mahasiswa->dosenPembimbing : 'Tidak Ditemukan'; // Ambil ID dosen pembimbing
        
        // Data pengajuan bimbingan
        $jadwalbmb = $mahasiswa->jadwalBimbingan()->latest()->first();

        return view('admin.contents.mahasiswa.dashboard', compact('dosenPembimbing', 'mahasiswa', 'jadwalbmb'), [
            'mahasiswa' => $mahasiswa,
            'nama'      => $mahasiswa ? $mahasiswa->nama : 'Tidak Ditemukan'
        ]);
    }

    // Jika tidak dikenali, arahkan ke login
    return redirect()->route('login');
}

}