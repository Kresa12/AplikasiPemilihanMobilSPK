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
        Schema::create('mobil', function (Blueprint $table) {
            $table->id('id_mobil'); // Primary Key
            $table->unsignedBigInteger('id_pabrikan'); // Foreign Key to pabrikan
            $table->string('nama_mobil');
            $table->timestamps();

            $table->foreign('id_pabrikan')->references('id_pabrikan')->on('pabrikan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobil');
    }
};