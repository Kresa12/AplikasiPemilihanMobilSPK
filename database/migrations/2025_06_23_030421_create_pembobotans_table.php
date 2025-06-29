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
        Schema::create('pembobotans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->onDelete('cascade'); // Foreign key ke tabel users, unique karena 1 user 1 set bobot

            // Bobot kriteria
            $table->double('w1')->default(0.2); // Bobot untuk harga_beli
            $table->double('w2')->default(0.2); // Bobot untuk fitur
            $table->double('w3')->default(0.2); // Bobot untuk model
            $table->double('w4')->default(0.2); // Bobot untuk harga_jual
            $table->double('w5')->default(0.2); // Bobot untuk nilai_pabrikan

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembobotans');
    }
};