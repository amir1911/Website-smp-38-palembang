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
        Schema::create('pengumuman', function (Blueprint $table) {
            $table->id();
            $table->string('judul');             // Judul pengumuman
            $table->longText('isi');             // Isi pengumuman
            $table->date('tanggal')->nullable(); // Tanggal pengumuman
            $table->boolean('status')->default(true); // Status aktif/tidak
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengumuman');
    }
};
