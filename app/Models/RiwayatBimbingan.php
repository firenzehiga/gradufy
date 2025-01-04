<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatBimbingan extends Model
{
    use HasFactory;

    protected $table = 'riwayat_bimbingan';
    protected $fillable = ['jadwal_id', 'tanggal', 'status', 'umpanBalik'];

    // Relasi ke Jadwal Bimbingan
    public function jadwalBimbingan()
    {
        return $this->belongsTo(JadwalBimbingan::class, 'jadwal_id');
    }
}
