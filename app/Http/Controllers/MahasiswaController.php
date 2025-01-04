<?php
namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
  

    public function index()
    {
        $user      = Auth::user();  // Mendapatkan pengguna yang login   
        // Mendapatkan semua mahasiswa yang terkait dengan dosen yang sedang login
        $mahasiswa = Mahasiswa::where('dosen_id', Auth::user()->dosen_id)->get();
        $dosen     = $user->dosen; // Mengambil data dosen yang terkait dengan user yang login


        // Mengirim data ke view, termasuk data mahasiswa dan nama dosen
        return view('admin.contents.dosen.mahasiswa.index', [
            'mahasiswa' => $mahasiswa,
            'dosen'     => $dosen,
            'nama'      => $dosen ? $dosen->nama : 'Tidak Ditemukan'
        ]);
    }
}
