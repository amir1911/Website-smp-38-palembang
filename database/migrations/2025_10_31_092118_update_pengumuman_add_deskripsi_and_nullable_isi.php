<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengumuman', function (Blueprint $table) {
            // Jadikan kolom 'isi' boleh kosong
            $table->longText('isi')->nullable()->change();

            // Tambahkan kolom 'deskripsi' (optional)
            $table->string('deskripsi', 255)->nullable()->after('judul');
        });
    }

    public function down(): void
    {
        Schema::table('pengumuman', function (Blueprint $table) {
            $table->longText('isi')->nullable(false)->change();
            $table->dropColumn('deskripsi');
        });
    }
};
