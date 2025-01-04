<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa'; // Nama tabel
    protected $fillable = ['nama', 'nim', 'alamat', 'telepon', 'email'];

     // Relasi ke Jadwal Bimbingan
     public function jadwalBimbingan()
     {
         return $this->hasMany(JadwalBimbingan::class, 'mahasiswa_id');
     }

     public function user()
    {
        return $this->hasOne(User::class, 'mahasiswa_id');
    }

    public function dosenPembimbing()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

}

