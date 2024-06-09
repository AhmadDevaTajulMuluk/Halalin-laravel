<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Berguna untuk menambahkan kolom iscomplete
     */
    public function up(): void
    {
        // Tambah kolom is_complete jika belum ada di tabel users
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_complete')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_complete');
        });
    }
};
