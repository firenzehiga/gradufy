<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Mengubah kolom tanggal menjadi DATETIME
        Schema::table('jadwal_bimbingan', function (Blueprint $table) {
            $table->dateTime('tanggal')->change();
        });

        // Menggabungkan kolom tanggal dan jam
        DB::table('jadwal_bimbingan')->update([
            'tanggal' => DB::raw('CONCAT(DATE(tanggal), " ", jam_bimbingan)')
        ]);

        // Menghapus kolom jam
        Schema::table('jadwal_bimbingan', function (Blueprint $table) {
            $table->dropColumn('jam_bimbingan');
        });
    }

    public function down()
    {
        // Mengembalikan perubahan kolom jika rollback dilakukan
        Schema::table('jadwal_bimbingan', function (Blueprint $table) {
            $table->time('jam_bimbingan')->nullable();
            $table->date('tanggal')->change();
        });
    }
};
