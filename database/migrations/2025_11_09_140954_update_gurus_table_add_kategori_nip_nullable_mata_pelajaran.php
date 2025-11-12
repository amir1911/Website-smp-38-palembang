<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('gurus', function (Blueprint $table) {
            if (!Schema::hasColumn('gurus', 'nip')) {
                $table->string('nip')->nullable()->after('nama');
            }

            if (!Schema::hasColumn('gurus', 'kategori')) {
                $table->string('kategori')->default('Guru')->after('nip');
            }

            // Ubah kolom mata_pelajaran agar bisa kosong
            $table->string('mata_pelajaran')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('gurus', function (Blueprint $table) {
            $table->dropColumn(['nip', 'kategori']);
            $table->string('mata_pelajaran')->nullable(false)->change();
        });
    }
};
