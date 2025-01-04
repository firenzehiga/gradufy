<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JadwalBimbingan;

class JadwalBimbinganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JadwalBimbingan::insert([
            [
                'mahasiswa_id' => 1,
                'dosen_id' => 1,
                'tanggal' => '2024-12-22',
                'jam_bimbingan' => '09:30:00',
                'status' => 'Menunggu Disetujui',
                'umpanBalik' => null,
            ],
        ]);
    }
}
