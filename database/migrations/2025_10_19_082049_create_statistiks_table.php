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
        Schema::create('statistiks', function (Blueprint $table) {
    $table->id();
    $table->integer('guru')->default(0);
    $table->integer('kelas7')->default(0);
    $table->integer('kelas8')->default(0);
    $table->integer('kelas9')->default(0);
    $table->integer('staf')->default(0);
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistiks');
    }
};
