<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UmpanBalik extends Model
{
    use HasFactory;

    protected $table = 'umpan_balik';
    protected $fillable = ['isi', 'tanggal', 'dikirimOleh', 'jadwal_id'];

    // Relasi ke Jadwal Bimbingan
    public function jadwalBimbingan()
    {
        return $this->belongsTo(JadwalBimbingan::class, 'jadwal_id');
    }
}
