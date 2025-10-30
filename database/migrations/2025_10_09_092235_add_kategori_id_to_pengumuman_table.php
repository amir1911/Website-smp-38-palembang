<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengumuman', function (Blueprint $table) {
            // Tambahkan kolom kategori_id
            $table->unsignedBigInteger('kategori_id')->nullable()->after('tanggal');

            // Jika ingin ada relasi ke tabel kategori_pengumuman
            $table->foreign('kategori_id')->references('id')->on('kategori_pengumuman')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('pengumuman', function (Blueprint $table) {
            $table->dropForeign(['kategori_id']);
            $table->dropColumn('kategori_id');
        });
    }
};
