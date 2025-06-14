<?php

namespace App\Http\Controllers;

use App\Models\JadwalNotifikasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class JadwalNotifikasiController extends Controller
{
    public function index()
    {

        $today = now()->format('Y-m-d');
        $threedaysLater = now()->addDays(3)->format('Y-m-d');
        // Mendapatkan semua data jadwal bimbingan dari database
        $jadwalnoti = JadwalNotifikasi::where('id', '!=', null)
        ->where('status', '=', 'Disetujui')
        ->whereBetween('tanggal', [$today, $threedaysLater])
        ->get();

        // Mendapatkan user yang sedang login
        $user = Auth::user();

        // Jika peran adalah dosen
        if ($user->role === 'dosen') {
            $dosen = $user->dosen; // Relasi dosen pada model User
            
            return view('admin.contents.dosen.jadwalNotifikasi.index', compact('jadwalnoti', 'dosen'));
        }
        // Jika peran tidak dikenali, arahkan ke login
        return redirect()->route('login');
    }

    public function kirimReminder()
    {        
        $today = now()->format('Y-m-d');
        $todayTime = strtotime((date('Y-m-d')));
        $threedaysLater = now()->addDays(3)->format('Y-m-d');
        
        // Mendapatkan semua data jadwal bimbingan dari database
        $jadwalnoti = JadwalNotifikasi::where('id', '!=', null)
        ->where('status', '=', 'Disetujui')
        ->whereBetween('tanggal', [$today, $threedaysLater])
        ->get();
        
        foreach ($jadwalnoti as $jwb) {

            $mahasiswa = $jwb->mahasiswa->nama; // Mengambil nama mahasiswa
            
            // Untuk mengambil selisih hari dari tanggal bimbingan tanggal saat ini  
            $selisihTanggal =  strtotime($jwb->tanggal->isoFormat('dddd, D MMMM Y')) - $todayTime;
            $selisiHari = $selisihTanggal / 86400;

            if ($selisiHari == 0) {
                $pesan = "*Subject: Daily Reminder Jadwal Bimbingan⚠*
Halo, $mahasiswa.

Hari ini jadwal bimbingan anda akan dimulai. Harap hadir tepat waktu. Jika ada kendala, segera informasikan kepada dosen pembimbing Anda.
       
Terima kasih dan semoga bimbingannya berjalan lancar! 😊

Salam,
[Tim Reminder Gradufy]";

            } 
            elseif ($selisiHari == 1) {
                    $pesan = "Subject: Daily Reminder Jadwal Bimbingan
Halo, $mahasiswa.

Besok jadwal bimbingan anda akan dimulai. Persiapkan diri untuk bimbingan.
       
Terima kasih! 😊

Salam,
[Tim Reminder Gradufy]";

            } 
            elseif ($selisiHari == 2) {
                    $pesan = "Subject: Daily Reminder Jadwal Bimbingan
Halo, $mahasiswa.

2 Hari lagi jadwal bimbingan anda akan dimulai.
       
Terima kasih! 😊

Salam,
[Tim Reminder Gradufy]";            } 
           
            $this->sendMessage($jwb->mahasiswa->telepon, $pesan);

        }

        return redirect()->route('dosen.jadwalNotifikasi');
    }

    public function sendMessage($nomor, $pesan)
    {

        // Kirim pesan ke nomor telepon mengugunakan API Wablas
        $curl = curl_init();
		$token = "39UkEbGICVD68BAzSR8pi6cpQYRdjhydk6n8prXg9a4fWVv5Mjgye9y";
        $secretKey = "cojhYlSM";
        $accessKey = $token.'.'.$secretKey;
		$data = [
			'phone'		=> $nomor,
			'message'	=> $pesan,
		];

		curl_setopt($curl, CURLOPT_HTTPHEADER,
			array(
				"Authorization: $accessKey",
			)
		);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($curl, CURLOPT_URL, "https://bdg.wablas.com/api/send-message");
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		
		$result = curl_exec($curl);
		curl_close($curl);

        return $result;

        
    }

    public function sedangBimbingan()
    {
        
        $today = now()->format('Y-m-d');

        // Mendapatkan semua data jadwal bimbingan dari database
        $jadwalnoti = JadwalNotifikasi::where('id', '!=', null)
        ->where('status', 'Disetujui')
        ->where(DB::raw('DATE(tanggal)'), $today)
        ->get();

        foreach ($jadwalnoti as $jwb) {
            
            $id = $jwb->id;
            $jadwalbmb = JadwalNotifikasi::findOrFail($id);

            $jadwalbmb->update(['status' => 'Sedang Bimbingan']);

        }


        return redirect()->route('dosen.jadwalBimbingan');
    }
    /**
 * Mengubah status jadwal yang sudah lewat dan belum disetujui menjadi "Expired"
 * Bisa dipanggil otomatis via endpoint untuk Cloud Scheduler
 */
public function expirePengajuan()
{
    // Ambil semua pengajuan yang expired
    $expiredJadwal = JadwalNotifikasi::where('status', 'Menunggu Disetujui')
        ->whereDate('tanggal', '<', now()->toDateString())
        ->get();

    foreach ($expiredJadwal as $jadwal) {
        $mahasiswa = $jadwal->mahasiswa;
        if ($mahasiswa) {
            $message = "*Subject: Pengajuan Bimbingan Expired❗*
Halo, $mahasiswa->nama.

Pengajuan bimbingan kamu pada tanggal " . $jadwal->tanggal->format('d-m-Y') . " telah expired karena belum disetujui dosen.

Silakan ajukan ulang jadwal bimbingan melalui sistem Gradufy.

Terima kasih.
[Tim Reminder Gradufy]";

            $this->sendMessage($mahasiswa->telepon, $message);
        }

        // (Opsional) Update status jadwal jadi expired
        $jadwal->status = 'Expired';
        $jadwal->save();
    }

    return redirect()->route('dosen.jadwalBimbingan');
}



}