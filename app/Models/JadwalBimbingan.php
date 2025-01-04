<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalBimbingan extends Model
{
    use HasFactory;

    protected $table = 'jadwal_bimbingan';
    protected $fillable = ['tanggal', 'status','deskripsiBimbingan', 'pesan', 'umpanBalik', 'tenggat_waktu', 'mahasiswa_id', 'dosen_id'];

    protected $casts = [
        'tanggal' => 'datetime',
        'tenggat_waktu' => 'datetime',
    ];
    
    // Relasi ke Mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    // Relasi ke Dosen
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    // Relasi ke Riwayat Bimbingan
    public function riwayatBimbingan()
    {
        return $this->hasOne(RiwayatBimbingan::class, 'jadwal_id');
    }
}
