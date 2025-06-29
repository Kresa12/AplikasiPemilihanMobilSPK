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
        Schema::create('pembobotan', function (Blueprint $table) {
            $table->id('id_pembobotan'); // Primary Key
            $table->unsignedBigInteger('id_user'); // Foreign Key to user
            $table->decimal('w1', 5, 2)->nullable(); // Adjust precision/scale as needed for weights
            $table->decimal('w2', 5, 2)->nullable();
            $table->decimal('w3', 5, 2)->nullable();
            $table->decimal('w4', 5, 2)->nullable();
            $table->decimal('w5', 5, 2)->nullable();
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembobotan');
    }
};