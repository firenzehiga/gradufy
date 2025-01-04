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
            $table->time('jam_bimbingan')->nullable();  // Kolom baru untuk jam
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jadwal_bimbingan', function (Blueprint $table) {
            $table->dropColumn('jam_bimbingan');  // Menghapus kolom 'jam_bimbingan' jika rollback
        });
    }
};
