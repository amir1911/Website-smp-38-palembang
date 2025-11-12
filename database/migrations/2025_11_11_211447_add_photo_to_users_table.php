<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi (tambah kolom foto profil).
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Tambahkan kolom 'photo' setelah kolom 'role'
            $table->string('photo')->nullable()->after('role');
        });
    }

    /**
     * Rollback migrasi (hapus kolom foto profil).
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Hapus kolom 'photo' saat rollback
            $table->dropColumn('photo');
        });
    }
};
