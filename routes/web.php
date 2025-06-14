<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JadwalBimbinganController;
use App\Http\Controllers\JadwalNotifikasiController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RiwayatBimbinganController;
use App\Models\JadwalBimbingan;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'role:dosen')->group(function () {
    Route::get('/dosen/profile/edit', [ProfileController::class, 'edit'])->name('profile.dosen.edit');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/dosen/profile/update', [ProfileController::class, 'update'])->name('profile.dosen.update');
});

Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.mahasiswa.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.mahasiswa.update');
});


// Route untuk Dosen
Route::middleware(['auth', 'role:dosen'])->group(function () {

    Route::get('/dosen/dashboard', [DashboardController::class, 'index'])->name('dosen.dashboard');

    Route::get('/dosen/jadwalNotifikasi', [JadwalNotifikasiController::class, 'index'])->name('dosen.jadwalNotifikasi');
    
    Route::get('/dosen/jadwalBimbingan', [JadwalBimbinganController::class, 'index'])->name('dosen.jadwalBimbingan');
    Route::get('/dosen/jadwalBimbingan/detail/{id}', [JadwalBimbinganController::class, 'detail'])->name('dosen.jadwalBimbingan.detail');
    Route::post('/dosen/jadwalBimbingan/acceptJadwal/{id}', [JadwalBimbinganController::class, 'acceptJadwal'])->name('dosen.jadwalBimbingan.accept');
    Route::patch('/dosen/jadwalBimbingan/ubahJadwal/{id}', [JadwalBimbinganController::class, 'ubahJadwal'])->name('dosen.jadwalBimbingan.revisi');
    
    Route::post('/dosen/jadwalBimbingan/kirimFeedback', [JadwalBimbinganController::class, 'sendFeedback'])->name('dosen.jadwalBimbingan.feedback');

    
    Route::get('/dosen/mahasiswa', [MahasiswaController::class, 'index'])->name('dosen.mahasiswa');
    
    Route::get('/dosen/riwayatBimbingan', [RiwayatBimbinganController::class, 'index'])->name('dosen.riwayatBimbingan');
    
});

// Route otomatis menggunakan cron
Route::get('/dosen/jadwalNotifikasi/kirimReminder', [JadwalNotifikasiController::class, 'kirimReminder'])->name('dosen.jadwalNotifikasi.kirimReminder');
Route::get('/dosen/jadwalNotifikasi/ubahStatus', [JadwalNotifikasiController::class, 'sedangBimbingan'])->name('dosen.jadwalNotifikasi.sedangBimbingan');
Route::get('/dosen/jadwalNotifikasi/statusExpired', [JadwalNotifikasiController::class, 'expirePengajuan']);

// Route untuk Mahasiswa
Route::middleware(['auth', 'role:mahasiswa'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('mahasiswa.dashboard');

    Route::get('/jadwalBimbingan', [JadwalBimbinganController::class, 'index'])->name('mahasiswa.jadwalBimbingan');
    Route::get('/mahasiswa/jadwalBimbingan/create', [JadwalBimbinganController::class, 'create'])->name('mahasiswa.jadwalBimbingan.create');
    Route::post('/mahasiswa/jadwalBimbingan/store', [JadwalBimbinganController::class, 'store'])->name('mahasiswa.jadwalBimbingan.store');
    Route::get('/jadwalBimbingan/detail/{id}', [JadwalBimbinganController::class, 'detail'])->name('mahasiswa.jadwalBimbingan.detail');

    Route::get('/riwayatBimbingan', [RiwayatBimbinganController::class, 'index'])->name('mahasiswa.riwayatBimbingan');
});




require __DIR__.'/auth.php';