<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('pelatihans', function (Blueprint $table) {
            if (!Schema::hasColumn('pelatihans', 'id')) {
                $table->id();
            }
            if (!Schema::hasColumn('pelatihans', 'judul')) {
                $table->string('judul');
            }
            if (!Schema::hasColumn('pelatihans', 'deskripsi')) {
                $table->text('deskripsi');
            }
            if (!Schema::hasColumn('pelatihans', 'file_html')) {
                $table->string('file_html');
            }
            if (!Schema::hasColumns('pelatihans', ['created_at', 'updated_at'])) {
                $table->timestamps();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelatihans');
    }
};
