<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';
    protected $fillable = ['alamat', 'telepon', 'email'];

    // Relasi ke Jadwal Bimbingan
    public function jadwalBimbingan()
    {
        return $this->hasMany(JadwalBimbingan::class, 'dosen_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'dosen_id');
    }

    public function mahasiswa()
{
    return $this->hasMany(Mahasiswa::class);
}

    
}
