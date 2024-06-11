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
        // Modify the `chats` table to drop the foreign key if it exists and make `hubungan_id` nullable
        Schema::table('chats', function (Blueprint $table) {
            if (Schema::hasColumn('chats', 'hubungan_id')) {
                $table->dropForeign(['hubungan_id']); // Drop the foreign key if it exists
                $table->dropColumn('hubungan_id')->nullable()->change();
            }
        });

        // Modify the `relations` table
        Schema::table('relations', function (Blueprint $table) {
            $table->id('hubungan_id')->autoIncrement()->change();
            $table->foreignId('ustadz_id')->nullable()->change();
            $table->boolean('start')->default(false)->after('ustadz_id'); // Adding `start` column after `ustadz_id`
        });

        // Add `hubungan_id` back to the `chats` table and make it nullable
        Schema::table('chats', function (Blueprint $table) {
            $table->foreignId('hubungan_id')->nullable()->constrained('relations')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
