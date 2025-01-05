<?php
namespace App\Http\Controllers;

use App\Models\JadwalBimbingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;
use Carbon\Carbon;

Carbon::setLocale('id'); // Set Waktu lokal ke Indonesia

class JadwalBimbinganController extends Controller
{
    
    public function index()
    {
        // Mendapatkan semua data pengajuan bimbingan yang terkait dengan dosen yang sedang login
        $jadwalbmb = JadwalBimbingan::where('tenggat_waktu', null)
        ->where('dosen_id', Auth::user()->dosen_id)->get();

        $user = Auth::user();  // Mendapatkan user yang sedang login

        // Jika peran adalah dosen
        if ($user->role === 'dosen') {
            $dosen = $user->dosen; // Relasi dosen pada model User
            
            return view('admin.contents.dosen.jadwalBimbingan.index', compact('jadwalbmb', 'dosen'));
        }

        // Jika peran adalah mahasiswa
        elseif ($user->role === 'mahasiswa') {
            $mahasiswa     = $user->mahasiswa; // Relasi mahasiswa pada model User

            // Mendapatkan jadwal bimbingan khusus untuk mahasiswa ini
            $jadwalbmb     = JadwalBimbingan::where('mahasiswa_id', $mahasiswa->id)->where('tenggat_waktu', '=', null)->get();
            
            // Ambil status jadwal terbaru
            $jadwalTerbaru = JadwalBimbingan::where('mahasiswa_id', $mahasiswa->id)
            ->latest('created_at')
            ->first();

            // Cek apakah mahasiswa dapat mengajukan jadwal bimbingan
            $canRequestBimbingan = !$jadwalTerbaru || $jadwalTerbaru->status === 'Bimbingan Selesai';

            
            return view('admin.contents.mahasiswa.jadwalBimbingan.index', compact('jadwalbmb','canRequestBimbingan'), [
                'mahasiswa' => $mahasiswa,
                'nama'      => $mahasiswa ? $mahasiswa->nama : 'Tidak Ditemukan'
            ]);
        }

        // Jika peran tidak dikenali, arahkan ke login
        return redirect()->route('login');
    }

    public function create()
    {
        $user = Auth::user(); // Mendapatkan user yang sedang login

        // Pastikan hanya mahasiswa yang dapat mengakses
        if ($user->role !== 'mahasiswa') {
            abort(403, 'Hanya mahasiswa yang dapat mengajukan jadwal bimbingan.');
        }

        return view('admin.contents.mahasiswa.jadwalBimbingan.create');
    }

    public function store(Request $request)
    {
        $user      = Auth::user();         // Mendapatkan user yang sedang login
        $mahasiswa = $user->mahasiswa;     // Mendapatkan data mahasiswa dari user
        $dosenId   = $mahasiswa->dosen_id; // Ambil ID dosen pembimbing dari relasi mahasiswa


        // Pastikan hanya mahasiswa yang dapat mengakses
        if ($user->role !== 'mahasiswa') {
            abort(403, 'Hanya mahasiswa yang dapat mengajukan jadwal bimbingan.');
        }

        if (!$dosenId) {
            return redirect()->back()->with('error', 'Anda belum memiliki dosen pembimbing.');
        }

        // Validasi input
        $validated = $request->validate([
            'tanggal_ajuan' => 'required|date|after:today',
            'deskripsi'     => 'required|string|min:10|max:255',
        ], [
            'tanggal_ajuan.required' => 'Tanggal pengajuan harus diisi.',
            'tanggal_ajuan.after'    => 'Tanggal pengajuan tidak boleh hari ini.',
            'deskripsi.required'     => 'Deskripsi bimbingan harus diisi.',
            'deskripsi.min'          => 'Deskripsi bimbingan minimal 10 karakter.',
        ]);

        // Membuat jadwal bimbingan baru
        JadwalBimbingan::create([
            'mahasiswa_id'       => $mahasiswa->id,
            'dosen_id'           => $dosenId,
            'tanggal'            => $validated['tanggal_ajuan'], // Mengisi kolom tanggal pengajuandengan dari form
            'deskripsiBimbingan' => $validated['deskripsi'],     // Mengisi kolom Deskripsi bimbingan dari form
            'status'             => 'Menunggu Disetujui',
        ]);

        
        $dosen      = $mahasiswa->dosenPembimbing;  // ambil dosen pembimbing
        $dosenName  = $dosen->nama;             // ambil nama dosen pembimbing
        $dosenPhone = $dosen->telepon;         // ambil telepon dosen pembimbing

        $mahasiswaName  = $mahasiswa->nama; // Ambil nama mahasiswa
        $mahasiswaPhone = $mahasiswa->telepon; // Ambil telepon mahasiswa


        // Pesan Whatssapp yang akan dikirim
        $messageDsn = "*Subject: Pengajuan Bimbingan TA*
Halo, Pak $dosenName.

Terdapat pengajuan bimbingan baru yang perlu anda setujui.

Mohon segera mengunjungi sistem Gradufy untuk persetujuan.
       
Salam,
[Tim Reminder Gradufy]";

// Pesan Whatssapp yang akan dikirim
$messageMhs = "*Subject: Reminder Jadwal Bimbingan Skripsi*
Halo, $mahasiswaName.

Pengajuan bimbingan anda telah berhasil dan sudah terkirim ke dosen pembimbing anda.

Silahkan tunggu pemberitahuan selanjutnya. Terima kasih 😊
       
Salam,
[Tim Reminder Gradufy]";

        $this->sendMessage($dosenPhone, $messageDsn);
        $this->sendMessage($mahasiswaPhone, $messageMhs);
        
        return redirect()->route('mahasiswa.jadwalBimbingan')->with('berhasil', 'Pengajuan bimbingan berhasil dibuat dan menunggu persetujuan dosen.');
    }

    public function detail($id)
    {
        // Mendapatkan user yang sedang login
        $user = Auth::user();
    
        $jadwalbmb = JadwalBimbingan::findOrFail($id);     // Mengambil data jadwal bimbingan berdasarkan ID
        $tanggal   = $jadwalbmb->tanggal->format('Y-m-d'); // Bagian tanggal saja
        $jam       = $jadwalbmb->tanggal->format('H:i');   // Bagian waktu saja
    
        // Jika peran adalah dosen
        if ($user->role === 'dosen') {
            $dosen = $user->dosen; // Relasi dosen pada model User
            
            if (!$dosen) {
                abort(404, 'Data dosen tidak ditemukan.');
            }
    
            return view('admin.contents.dosen.jadwalBimbingan.detail', compact('jadwalbmb', 'tanggal', 'jam'), [
                'dosen' => $dosen,
                'nama'  => $dosen->nama,
            ]);
        }
    
        // Jika peran adalah mahasiswa
        if ($user->role === 'mahasiswa') {
            $mahasiswa = $user->mahasiswa; // Relasi mahasiswa pada model User
            
            if (!$mahasiswa) {
                abort(404, 'Data mahasiswa tidak ditemukan.');
            }
    
            // Pastikan mahasiswa hanya dapat melihat jadwal miliknya
            if ($jadwalbmb->mahasiswa_id !== $mahasiswa->id) {
                abort(403, 'Anda tidak memiliki akses ke data ini.');
            }
    
            return view('admin.contents.mahasiswa.jadwalBimbingan.detail', compact('jadwalbmb', 'tanggal', 'jam'), [
                'mahasiswa' => $mahasiswa,
                'nama'      => $mahasiswa->nama,
            ]);
        }
    
        // Jika peran tidak dikenali
        abort(404, 'Halaman tidak ditemukan.');
    }
    

    public function acceptJadwal($id)
    {
        $jadwalbmb = JadwalBimbingan::findOrFail($id);
        $jadwalbmb->status = 'Disetujui';
        $jadwalbmb->save();
        
        $dosen     = $jadwalbmb->dosen->nama;               // Mengambil nama dosen pembimbing
        $mahasiswa = $jadwalbmb->mahasiswa->nama;           // Mengambil nama mahasiswa
        $tanggal   = $jadwalbmb->tanggal->format('Y-m-d');  // Mengambil tanggal jadwal bimbingan
        $jam       = $jadwalbmb->tanggal->format('H:i');    // Mengambil jam jadwal bimbingan


        // Pesan Whatssapp yang akan dikirim
        $message = "*Subject: Reminder Jadwal Bimbingan Skripsi*
Halo, $mahasiswa.

Kami mengingatkan bahwa pengajuan bimbingan anda disetujui dengan Bapak/Ibu $dosen pada:

📅 Tanggal: $tanggal
⏰ Jam    : $jam

Harap hadir tepat waktu. Jika ada kendala, segera informasikan kepada dosen pembimbing Anda.
       
Terima kasih dan semoga bimbingannya berjalan lancar! 😊

Salam,
[Tim Reminder Gradufy]";

        $this->sendMessage($jadwalbmb->mahasiswa->telepon, $message);
        // $this->sendMessage("087880159365", "Jadwal bimbingan telah disetujui.");

        return redirect()->route('dosen.jadwalBimbingan')->with('success', 'Jadwal bimbingan berhasil disetujui.');
    }

    public function sendMessage($nomor, $pesan)
    {

        // Kirim pesan ke nomor telepon mengugunakan API Wablas
        $curl = curl_init();
		$token = "CxisAtDRxqFtW8wvyj0hbmhqvvm9IpUBVrWQWZr8c6XpVOoTPXvG9u5Y3vbzZY7m";
		$data = [
			'phone'		=> $nomor,
			'message'	=> $pesan,
		];

		curl_setopt($curl, CURLOPT_HTTPHEADER,
			array(
				"Authorization: $token",
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

    public function ubahJadwal(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'pesan'   => 'required|string|max:255',
        ]);

        $jadwalbmb = JadwalBimbingan::findOrFail($id);
        $jadwalbmb->tanggal = $validated['tanggal'];
        $jadwalbmb->pesan = $validated['pesan'];
        $jadwalbmb->status = 'Jadwal Direvisi';
        $jadwalbmb->save();

        $dosen     = $jadwalbmb->dosen->nama;               // Mengambil nama dosen pembimbing
        $mahasiswa = $jadwalbmb->mahasiswa->nama;           // Mengambil nama mahasiswa
        $tanggal   = $jadwalbmb->tanggal->format('Y-m-d');  // Mengambil tanggal jadwal bimbingan
        $jam       = $jadwalbmb->tanggal->format('H:i');    // Mengambil jam jadwal bimbingan


        // ⏰ Jam: " . $validated['tanggal'] . "

        // Pesan Whatssapp yang akan dikirim
        $message = "*Subject: Reminder Perubahan Jadwal Bimbingan*
Halo, $mahasiswa.

Kami mengingatkan bahwa pengajuan bimbingan anda mengalami perubahan oleh Bapak/Ibu $dosen menjadi pada:

📅 Tanggal: " . $validated['tanggal'] ."
📝 Alasan : " . $validated['pesan'] . "

Harap hubungi dosen pembimbing, terkait dengan perubahan jadwal tersebut.
       
Terima kasih dan semoga bimbingannya berjalan lancar! 😊

Salam,
[Tim Reminder Gradufy]";

        $this->sendMessage($jadwalbmb->mahasiswa->telepon, $message);


        return redirect()->route('dosen.jadwalBimbingan')->with('success', 'Pengajuan bimbingan berhasil direvisi.');
    }

    public function sendFeedback(Request $request)
    {
        $user = Auth::user();

        // Pastikan user adalah dosen
        if ($user->role !== 'dosen') {
            abort(403, 'Hanya dosen yang dapat mengakses fitur ini.');
        }

        $validated = $request->validate([
            'jadwal_id'    => 'required|exists:jadwal_bimbingan,id',
            'umpanBalik'   => 'required|string|max:500',
            'tenggatWaktu' => 'required|date',
        ]);

        $jadwal  = JadwalBimbingan::findOrFail($validated['jadwal_id']);

        // Pastikan jadwal milik dosen yang login
        if ($jadwal->dosen_id !== $user->id) {
            abort(403, 'Anda tidak memiliki akses ke data ini.');
        }

        $jadwal                = JadwalBimbingan::findOrFail($validated['jadwal_id']);
        $jadwal->umpanBalik    = $validated['umpanBalik'];
        $jadwal->tenggat_waktu = $validated['tenggatWaktu'];
        $jadwal->save();
        $jadwal->update(['status' => 'Bimbingan Selesai']);

        // Mengambil nama mahasiswa
        $mahasiswa = $jadwal->mahasiswa->nama;

        // Pesan Whatssapp yang akan dikirim
        $message = "*Subject: Reminder Informasi setelah Bimbingan*
Halo, $mahasiswa.
    
Sesi Bimbingan anda telah selesai dilakukan. Silahkan cek Umpan Balik dari dosen pada aplikasi
            
Terima kasih dan semoga proses pengerjaan Tugas Akhir berjalan lancar! 😊
        
Salam,
[Tim Reminder Gradufy]";
        
        $this->sendMessage($jadwal->mahasiswa->telepon, $message);

        return redirect()->back()->with('success', 'Feedback berhasil diberikan.');
    }



}
