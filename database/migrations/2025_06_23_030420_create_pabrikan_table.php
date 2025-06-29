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
        Schema::create('pabrikan', function (Blueprint $table) {
            $table->id('id_pabrikan'); // Primary Key
            $table->string('merk_pabrikan');
            $table->integer('nilai'); // Assuming 'nilai' is an integer
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pabrikan');
    }
};