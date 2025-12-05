<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
{
    Schema::table('pengumuman', function (Blueprint $table) {
        $table->string('instagram_link')->nullable()->after('isi');
    });
}

public function down(): void
{
    Schema::table('pengumuman', function (Blueprint $table) {
        $table->dropColumn('instagram_link');
    });
}

};
