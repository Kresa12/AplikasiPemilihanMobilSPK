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
        Schema::create('user', function (Blueprint $table) {
            $table->id('id_user'); // Primary Key
            $table->string('nama');
            $table->string('no_kontak')->nullable();
            $table->string('alamat')->nullable();
            $table->string('email')->unique(); // Added for authentication, if needed
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password'); // Added for authentication, if needed
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};