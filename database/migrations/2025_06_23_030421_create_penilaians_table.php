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
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id('id_penilaian'); // Primary Key
            $table->unsignedBigInteger('id_mobil'); // Foreign Key to mobil
            $table->unsignedBigInteger('id_user'); // Foreign Key to user
            $table->decimal('harga_beli', 10, 2); // Adjust precision/scale as needed for currency
            $table->string('fitur');
            $table->string('model');
            $table->decimal('harga_jual', 10, 2);
            $table->date('tanggal_penilaian');
            $table->timestamps();

            $table->foreign('id_mobil')->references('id_mobil')->on('mobil')->onDelete('cascade');
            $table->foreign('id_user')->references('id_user')->on('user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian');
    }
};