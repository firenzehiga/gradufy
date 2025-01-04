<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JadwalNotifikasi extends Model
{
    use HasFactory;

    protected $table = 'jadwal_bimbingan';
    protected $fillable = ['tanggal', 'status', 'umpanBalik', 'mahasiswa_id', 'dosen_id'];

    protected $casts = [
        'tanggal' => 'datetime',
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

}
