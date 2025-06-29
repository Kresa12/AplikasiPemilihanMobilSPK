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
        Schema::create('penilaians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key ke tabel users
            $table->foreignId('mobil_id')->constrained()->onDelete('cascade'); // Foreign key ke tabel mobils

            // Kriteria penilaian
            $table->double('harga_beli'); // Cost
            $table->double('fitur');      // Benefit
            $table->double('model');      // Benefit
            $table->double('harga_jual'); // Benefit

            $table->date('tanggal_penilaian')->nullable(); // Tanggal penilaian (opsional, bisa diambil dari created_at)
            $table->timestamps();

            // Memastikan kombinasi user dan mobil itu unik (satu user hanya bisa menilai satu mobil sekali)
            $table->unique(['user_id', 'mobil_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaians');
    }
};