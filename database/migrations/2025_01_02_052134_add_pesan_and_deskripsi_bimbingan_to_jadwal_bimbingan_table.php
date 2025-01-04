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
        Schema::table('jadwal_bimbingan', function (Blueprint $table) {
            $table->text('pesan')->nullable()->after('status'); // Alasan dosen saat mengubah jadwal
            $table->text('deskripsiBimbingan')->nullable()->after('tanggal'); // Deskripsi kegiatan bimbingan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jadwal_bimbingan', function (Blueprint $table) {
            $table->dropColumn('pesan');
            $table->dropColumn('deskripsiBimbingan');
        });
    }
};
