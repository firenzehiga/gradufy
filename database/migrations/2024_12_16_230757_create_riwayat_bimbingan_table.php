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
        Schema::create('riwayat_bimbingan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_bimbingan_id')->nullable();
            $table->string('jadwal');
            $table->date('tanggal');
            $table->string('status');
            $table->text('umpanBalik')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_bimbingan');
    }
};
