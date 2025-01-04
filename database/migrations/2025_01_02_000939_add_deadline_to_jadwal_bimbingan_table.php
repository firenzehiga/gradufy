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
            $table->dateTime('tenggat_waktu')->nullable()->after('umpanBalik'); // Kolom untuk tanggal tenggat waktu
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jadwal_bimbingan', function (Blueprint $table) {
            $table->dropColumn('tenggat_waktu');
        });
    }
};
