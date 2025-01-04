<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwal_bimbingan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->nullable();
            $table->foreignId('dosen_id')->nullable();
            $table->date('tanggal');
            $table->string('status')->default('Menunggu Disetujui');
            $table->text('umpanBalik')->nullable();
            $table->string('pengingat');
            $table->string('waktuPengingat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_bimbingan');
    }
};
