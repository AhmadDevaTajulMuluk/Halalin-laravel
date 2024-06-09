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
        Schema::table('articles', function (Blueprint $table) {
            if (!Schema::hasColumn('articles', 'article_id')) {
                $table->id('article_id');
            }
            if (!Schema::hasColumn('articles', 'title')) {
                $table->string('title', 225);
            }
            if (!Schema::hasColumn('articles', 'writer')) {
                $table->string('writer', 100);
            }
            if (!Schema::hasColumn('articles', 'content')) {
                $table->text('content');
            }
            if (!Schema::hasColumn('articles', 'publish_date')) {
                $table->date('publish_date');
            }
            if (!Schema::hasColumn('articles', 'reference')) {
                $table->text('reference');
            }
            if (!Schema::hasColumn('articles', 'article_image')) {
                $table->text('article_image');
            }
            if (!Schema::hasColumns('articles', ['created_at', 'updated_at'])) {
                $table->timestamps();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
