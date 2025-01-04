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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('dosen_id')->nullable()->after('id'); // Menambahkan kolom dosen_id
            $table->unsignedBigInteger('mahasiswa_id')->nullable()->after('dosen_id'); // Menambahkan kolom mahasiswa_id
    
            // Menambahkan foreign key
            $table->foreign('dosen_id')->references('id')->on('dosen')->onDelete('cascade');
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop foreign key terlebih dahulu
            $table->dropForeign(['dosen_id']);
            $table->dropForeign(['mahasiswa_id']);
    
            // Hapus kolom
            $table->dropColumn(['dosen_id', 'mahasiswa_id']);
        });
    }
};
