<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('mobils', function (Blueprint $table) {
            $table->foreignId('pabrikan_id')->nullable()->constrained()->onDelete('set null'); // Atau onDelete('cascade')
        });
    }

    public function down(): void
    {
        Schema::table('mobils', function (Blueprint $table) {
            $table->dropForeign(['pabrikan_id']);
            $table->dropColumn('pabrikan_id');
        });
    }
};