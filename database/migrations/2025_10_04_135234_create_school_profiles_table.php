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
       Schema::create('school_profiles', function (Blueprint $table) {
    $table->id();
    $table->longText('description')->nullable();
    $table->longText('history')->nullable();
    $table->text('vision')->nullable();
    $table->longText('mission')->nullable();
    $table->string('structure_image')->nullable();
    $table->longText('facilities')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_profiles');
    }
};
