<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('gurus', function (Blueprint $table) {
            // Hapus kolom linkedin jika sebelumnya sudah ada
            if (Schema::hasColumn('gurus', 'linkedin')) {
                $table->dropColumn('linkedin');
            }

            // Pastikan kolom facebook & instagram sudah ada
            if (!Schema::hasColumn('gurus', 'facebook')) {
                $table->string('facebook')->nullable()->after('foto');
            }

            if (!Schema::hasColumn('gurus', 'instagram')) {
                $table->string('instagram')->nullable()->after('facebook');
            }
        });
    }

    public function down(): void
    {
        Schema::table('gurus', function (Blueprint $table) {
            $table->dropColumn(['facebook', 'instagram']);
            $table->string('linkedin')->nullable()->after('foto');
        });
    }
};
