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
        Schema::table('admins', function (Blueprint $table) {
            if (!Schema::hasColumn('admins', 'admin_id')) {
                $table->id('admin_id');
            }
            if (!Schema::hasColumn('admins', 'name')) {
                $table->string('name');
            }
            if (!Schema::hasColumn('admins', 'username')) {
                $table->string('username')->unique();
            }
            if (!Schema::hasColumn('admins', 'password')) {
                $table->string('password');
            }
            if (!Schema::hasColumns('admins', ['created_at', 'updated_at'])) {
                $table->timestamps();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
