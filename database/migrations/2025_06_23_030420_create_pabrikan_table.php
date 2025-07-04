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
        Schema::create('pabrikans', function (Blueprint $table) {
            $table->id();
            $table->string('merk_pabrikan')->unique(); // Nama merk pabrikan
            $table->integer('nilai'); // Nilai tetap untuk pabrikan (Benefit)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pabrikans');
    }
};