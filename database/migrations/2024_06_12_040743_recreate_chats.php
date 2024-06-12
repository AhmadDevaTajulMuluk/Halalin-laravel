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
        Schema::dropIfExists('chats');
        Schema::create('chats', function (Blueprint $table) {
            $table->id('chat_id')->autoIncrement();
            $table->integer('hubungan_id');
            $table->string('messages');
            $table->timestamp('send_at');
            $table->string('send_by');
        });
        // TAMBAH FOREIGN KEY MANDIRI DI PHPMYADMIN
        // ALTER TABLE chats
        // ADD FOREIGN KEY (hubungan_id)
        // REFERENCES relations(hubungan_id)
        // ON DELETE CASCADE;
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
